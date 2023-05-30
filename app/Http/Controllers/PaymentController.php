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
            'payments' => Payment::all(),
            'schedules' => Schedule::all(),
            'users' => User::all(),
            'identities'=> Identity::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.participant.test-form ', [
            'schedules' => Schedule::all()
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
