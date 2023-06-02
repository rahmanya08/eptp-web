<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PaymentController extends Controller
{
    public function payment()
    {
        return view('dashboard.staff.payment', [
            'title' => 'Payment',
            'payments' => Payment::select('payments.id', 'users.name', 'payments.pay_url', 'payments.is_payed')
            ->join('users', 'users.id', '=', 'payments.user_id' )->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.participant.test-form ', [
            'schedules' => Schedule::all(),
            'identities' => Identity::select('image')->where('user_id', auth()->user()->id)
        ]);
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
        return view('dashboard.registrant', [
            'title' => 'Registration Data',
            'payments' => Payment::select('payments.created_at', 'users.name', 'schedules.type_test', 'schedules.date_test')
            ->join('users', 'users.id', '=', 'payments.user_id' )->join('schedules','schedules.id', '=', 'payments.schedule_id')->get()
        ]);
    }



    //Input Data Test Payment
    public function store(Request $request)
    {
        //  dd($request->all());
        $validatedData = $request->validate([
            'schedule_id' =>'required',
            'pay_url' =>'required','min:5','max:255',
        ]);  

        $validatedData['user_id'] = auth()->user()->id;
        //$request->get('schedule_id');
        //$request->session()->put('schedule_id', 'schedule_id');
        //$validatedData['schedule_id'] = auth()->schedule()->id;

        if ($request->hasFile('pay_url')) 
        {
            $destination_path = 'public/images/payments';
            $image = $request->file('pay_url');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('pay_url')->storeAs($destination_path, $image_name);

            $validatedData['pay_url'] = $path;
        }


        Payment::create($validatedData);
    

        return redirect('/test-card')->with('success', 'Formulir Complete! Please Download The Test Card');
    }

}
