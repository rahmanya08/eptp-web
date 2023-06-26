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

class PaymentController extends Controller
{
    public function payment()
    {
        $payments = DetailTest::select('detail_tests.id', 'users.name', 'detail_tests.pay_url', 
        'detail_tests.is_payed', 'tests.date_test')
        ->join('users', 'users.id', '=', 'detail_tests.participant_id' )
        ->join('tests','tests.id' , '=','detail_tests.test_id')
        ->get();

        $profile = Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get();
        return view('dashboard.staff.payment', compact('payments','profile'));
    }

    public function create()
    {
        $schedules = Test::select('tests.id','tests.date_test')->get();
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
        $capactiy = Test::whereHas('detail_tests', function ($query) {
            $query->groupBy('test_id')->havingRaw('COUNT(*) < 22');
        })
        ->orWhereDoesntHave('detail_tests')
        // ->where('status_test', true)
        ->pluck('date_test', 'id');
        

        $profile = Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get();
        return view('dashboard.participant.test-form ', compact('schedules','profile','capactiy'));
    }

    /** 
    * public function showScheduleList()
    * {
    *    $schedules = Test::withCount('participants')
    *        ->whereHas('participants', function ($query) {
    *            $query->having('participants_count', '<', 22);
    *        })
    *        ->get();
    *
    *    return view('schedule-list', ['schedules' => $schedules]);
    * }
    */

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

        $data = DetailTest::select('detail_tests.registration' , 'users.name','detail_tests.participant_id', 'tests.type_test', 'tests.date_test' ,'tests.staff_id')
        ->join('tests','detail_tests.test_id', '=', 'tests.id')
        ->join('users','detail_tests.participant_id','=', 'users.id')
        ->get();

        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();
        return view('dashboard.registrant', compact('data','profile'));
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



    public function store(Request $request, DetailTest $detailtest)
    {
        //dd($request->all());

        // Format the created_at timestamp
        $formattedDate = Carbon::parse($detailtest->created_at)->format('ym');

        // Concatenate the formatted date and padded id
        $registrationNumber = $formattedDate . str_pad($detailtest->id, 6, '0', STR_PAD_LEFT);

        $validatedData = $request->validate([
            'pay_url' =>'required','min:5','max:255',
            'test_id' =>  'required'
        ]);

        $validatedData['registration'] = $registrationNumber;
        $validatedData['participant_id'] = auth()->user()->id;

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
            ->first();

        $didnoTest = DetailTest::join('tests','detail_tests.test_id','=','tests.id') 
            ->where('detail_tests.participant_id', $id) 
            ->where('tests.status_test', '1')
            ->first();

        if ($existingRegistration) {
            
            return redirect('/menu-test')->with('failed', "You Have Already Registered!");
        }
        else
        {
            if ($didnoTest) {
                return redirect('/menu-test')->with('failed', "Do Your Test First!");
            } else {
                
                DetailTest::create($validatedData);
                return redirect('/test-card')->with('success', 'Thank you! Please Waiting fo Verify');
            }
        }

    }

    /*Edit Status Payment*/
    public function editStatus($id)
    {
        $data = DetailTest::find($id);
        return view('dashboard.staff.edit-payment',[
            'identities' => Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get(),
            'data'=>$data
        ]);
    }

    //Update Status Payment
    public function updateStatus(Request $request)
    {
        //dd($request->all());
        $data = DetailTest::find($request->id);
        $data->is_payed = $request->verify;
        $data->save();

        return redirect('/menu-payment')->with('success', 'Payment verified!');
    }

    public function testStatus(Request $request, $id)
    {
        $data = DetailTest::find($request->id);
        $data->test_status = $request->verify;
        $data->save();

        return response()->json(['success' => true]);
    }


}
