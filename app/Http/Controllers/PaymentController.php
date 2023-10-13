<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\DetailTest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;
use App\Notifications\TestApplicantWhatsApp;

class PaymentController extends Controller
{
    public function payment()
    {
        $payments = DetailTest::select('detail_tests.id', 'users.name', 'detail_tests.pay_url', 
        'detail_tests.is_payed', 'tests.date_test')
        ->join('users', 'users.id', '=', 'detail_tests.participant_id' )
        ->join('tests','tests.id' , '=','detail_tests.test_id')
        ->orderBy('is_payed')
        ->get();

        $profile = Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get();
        return view('dashboard.staff.payment', compact('payments','profile'));
    }

    public function create()
    {

        /**
         * SELECT id, date_test
         * FROM tests
         * WHERE EXISTS (
         *      SELECT test_id
         *      FROM detail_tests
         *      WHERE tests.id = detail_tests.test_id
         *      GROUP BY test_id
         *      HAVING COUNT(*) < 22
         * )
         *  OR NOT EXISTS (
         *      SELECT test_id
         *      FROM detail_tests
         *      WHERE tests.id = detail_tests.test_id
         * )
         */
        
        /** $capactiy = Test::whereHas('detail_tests', function ($query) use ($quota) {
            *     $query->groupBy('test_id')->havingRaw('COUNT(*) < ?', [$quota])->where('tests.status_test', false);
            * })
            * ->orWhereDoesntHave('detail_tests')
            * ->where('tests.status_test', false)
            * ->pluck('date_test','time_test', 'id');
        */
        // $capacity = Test::where(function ($query) use ($quota, $nextDay, $minimumAllowedDate) {
        //     $query->WhereDate('tests.date_test', '>=', $minimumAllowedDate);
        //     $query->whereDate('tests.date_test','!=', $nextDay); 
        //     $query->where(function ($query) use ($quota) {
        //         $query->whereHas('detail_tests', function ($query) use ($quota) {
        //             $query->groupBy('test_id')
        //                 ->havingRaw('COUNT(*) < ?', [$quota])
        //                 ->where('tests.status_test', false)
        //                 ->where('detail_tests.reg_status',true)
        //                 ->whereNotNull('pay_url');
        //         })->orWhereDoesntHave('detail_tests');
        //     })
        //     ->where('tests.status_test', false)
        //     ->pluck('tests.date_test', 'tests.id');
        // });

        $schedules = Test::select('tests.id','tests.date_test')->get();
        $quota     = Test::select('quota')->value('quota');
        
        $today = now()->toDateString();
        $nextDay = now()->addDay()->toDateString();        
        $minimumAllowedDate = now()->addDays(3)->toDateString();

        if ($quota !== null) {
           $capacity = Test::whereHas('detail_tests', function ($query) use ($quota) {
                 $query->groupBy('test_id')->havingRaw('COUNT(*) < ?', [$quota])
                 ->where('tests.status_test', false);
             })
             ->orWhereDoesntHave('detail_tests')
             ->where('tests.status_test', false)
             ->whereDate('tests.date_test', '>=', $minimumAllowedDate)
             ->whereDate('tests.date_test','!=', $nextDay)
             ->pluck('date_test','id');
        } else {
            return redirect('/dashboard-participant')->with('failed', 'There is no schedule');
        }
        
        $profile = Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('dashboard.participant.test-form ', compact('schedules','profile','capacity'));
    }


    public function participant ()
    {
        return view('dashboard.admin.participant', [
            'title' => 'Participant',
            'identities' => Identity::all()->where('position', '=', null),
            'users' => User::select('name')->join('identities', 'users.id', '=', 'identities.user_id' )->get()
        ]);
    }


    public function registrant ()
    {
        $id = Auth::user()->id;

        $data = DetailTest::select('detail_tests.registration', 'detail_tests.created_at', 'users.name',
        'detail_tests.participant_id', 'detail_tests.date_validation','tests.type_test', 'tests.date_test', 'detail_tests.is_payed',
        'detail_tests.reg_status','detail_tests.due_date','tests.staff_id')
        ->join('tests','detail_tests.test_id', '=', 'tests.id')
        ->join('users','detail_tests.participant_id','=', 'users.id')
        ->orderBy('date_validation')
        ->get();

        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $listparticipant = DetailTest::select('detail_tests.registration', 'detail_tests.created_at', 'users.name',
        'detail_tests.participant_id', 'detail_tests.date_validation','tests.type_test', 'tests.date_test', 'detail_tests.is_payed',
        'detail_tests.reg_status','detail_tests.due_date', 'detail_tests.reg_date','tests.staff_id')
        ->join('tests','detail_tests.test_id', '=', 'tests.id')
        ->join('users','detail_tests.participant_id','=', 'users.id')
        ->get();
        
        foreach ($listparticipant as $peserta){
            $reg_date = Carbon::parse($peserta->reg_date);
            $due_date = Carbon::parse($peserta->due_date); 
            if ($due_date >= $reg_date->addHours(24)) {
                $peserta->reg_status = false;
                $peserta->save();
            }
        }

        return view('dashboard.registrant', ['pesertaList' => $listparticipant] ,compact('data','profile'));
    }



    /*Participant register test with choose schedule and upload payment receipt,
    then store in detail test using this function*/
    // public function store(Request $request)
    // {
    //     //dd($request->all());
    //     $validatedData = $request->validate([
    //         'test_id' =>'required',
    //         'pay_url' =>'required','min:5','max:255',
    //     ]);  

    //     $validatedData['user_id'] = auth()->user()->id;

    //     if ($request->hasFile('pay_url')) 
    //     {
    //         $destination_path = 'public/images/payments';
    //         $image = $request->file('pay_url');
    //         $image_name = $image->getClientOriginalName();
    //         $path = $request->file('pay_url')->storeAs($destination_path, $image_name);

    //         $validatedData['pay_url'] = $image_name;
    //     }

    
    //    DetailTest::create($validatedData);
    

    //     return redirect('/test-card')->with('success', 'Thank you! Please Waiting fo Verify');
    // }



    public function store(Request $request)
    {
        //dd($request->all());

        // Get the current year and month
        $currentYear = Carbon::now()->format('y');
        $currentMonth = Carbon::now()->format('m');

        // Get the latest test detail ID
        $latestDetailTest = DetailTest::latest('id')->first();

        // Calculate the next registration number
        $nextNumber = ($latestDetailTest ? ($latestDetailTest->id + 1) : 1);
        
        //Date Now
        $currentDate = Carbon::now();
        // Format the registration number
        $registrationNumber = $currentYear . $currentMonth . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        $validatedData = $request->validate([
            'pay_url' =>  'min:5','max:255',
            'test_id' =>  'required'
        ]);        

        $validatedData['registration'] = $registrationNumber;
        $validatedData['participant_id'] = auth()->user()->id;
        $validatedData['reg_date'] = $currentDate;
        if ('pay_url' !== null) {
            $validatedData['due_date'] = $currentDate->addHours(24);
        } else {
            $validatedData['due_date'] = null;
        }
        
        
        if ($request->hasFile('pay_url')) 
        {
            $destination_path = 'public/images/payments';
            $image = $request->file('pay_url');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('pay_url')->storeAs($destination_path, $image_name);
            $validatedData['pay_url'] = $image_name;
        }

        // Check if data exist
        $id = auth()->user()->id;
        $testDate = $request->input('test_id');

        $existingRegistration = DetailTest::where('participant_id', $id)
            ->where('test_id', $testDate)
            ->whereNotNull('pay_url')
            ->first();

        $didnoTest = DetailTest::join('tests','detail_tests.test_id','=','tests.id') 
            ->where('detail_tests.participant_id', $id) 
            ->where('tests.status_test', false)
            ->first();

        $updatePay = DetailTest::where('participant_id', $id)
        ->where('test_id', $testDate)
        ->where('pay_url', null)
        ->first();

        $staffNumber = Identity::select('phone')
            ->where('position', 'staff');
        
        $paymentDeadline = Carbon::now()->addHours(24);
        $uploadedPayment = $request->hasFile('pay_url');
        $message = 'Pendaftaran berhasil. Pembayaran telah diterima. 
        Anda dapat mengunduh kartu tes yang disertai tanda tangan Kepala UPT Bahasa';

        if ($existingRegistration) {
            return redirect('/menu-test')->with('failed', "You Have Already Registered!");
        }else{
            if($updatePay){
                $updatePay->update($validatedData);
            }else{
            if($didnoTest){
                return redirect('/menu-test')->with('failed', "Did Your Test First!");
            }else{
                DetailTest::create($validatedData);
                if($uploadedPayment){
                    $message;
                }else{
                    $message = 'Silakan unggah bukti pembayaran sebelum ' . $paymentDeadline->format('Y-m-d H:i') . '.';
                }
              }
            }   
            return view('partials.modal-popup',  compact('message'));
        }
    }

    public function sendWhatsAppNotif(Request $request)
    {
        $user = User::find(1);
        return response()->json(['message'=>'WhatsApp notification sent successfully.']);
    }



    /*Edit Status Payment*/
    public function editStatus($id)
    {
        $data = DetailTest::find($id);

        $isChecked = $data->is_payed; 

        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();
        return view('dashboard.staff.edit-payment', compact('data','profile','isChecked'));
    }

    //Update Status Payment
    public function updateStatus(Request $request)
    {
        //dd($request->all());

        $data = DetailTest::find($request->id);
       
        if (!$data) {
            return redirect()->back()->with('failed', 'There is No Prove of Payment');
        }
    
        $isChecked = $request->has('verify');
        if ($isChecked) {
            $data->is_payed = $request->verify;
            $data->save();
            return redirect('/menu-payment')->with('success', 'Payment verified!');
        } else {
            $data->date_validation = null;
            $data->validator = null;
            return redirect()->back()->with('failed', 'Check the CheckBox Fisrt!');
        }
        

        
    }

}
