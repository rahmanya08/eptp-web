<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Payment;
use App\Models\Result;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function testcard()
    {
        return view('dashboard.participant.test-card ', [
            'title' => 'Test Card',
            'payments' => Payment::select('payments.created_at', 'schedules.date_test')
            ->join('schedules' , 'schedules.id', '=' ,'payments.schedule_id')
            ->where('user_id', auth()->user()->id)
            ->get(), 
            
            'users' => User::select('users.name', 'identities.birth_date', 'identities.phone')
            ->join('identities' ,'identities.user_id' ,'=' ,'users.id')
            ->where('user_id', auth()->user()->id)
            ->get()

        ]);
    }

    public function result ()
    {
        return view('dashboard.staff.result', [
            'title' => 'Result',
            'users' => User::select('payments.user_id','users.name')->join('payments' , 'users.id','=','payments.user_id')->get(),
            'results' => Result::select('results.id','users.name', 'results.skor', 'results.sertif_url', 'results.result_status')
            ->join('users', 'users.id','=', 'results.user_id' )->get(),
        ]);
    }
    
    public function announce ()
    {
        return view('dashboard.participant.announce ', [
            'title' => 'Announce',
            'results' => Result::select('skor')
            ->join('users', 'results.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get()

        ]);
    }

    //Input Data Result
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'user_id' =>'required',
            'skor' =>'required',
            'sertif_url' =>'required','min:5','max:255'
        ]);  

        //$validatedData['user_id'] = auth()->user()->id;
        if ($request->hasFile('sertif_url')) 
        {
            $destination_path = 'public/file/certif';
            $file = $request->file('sertif_url');
            $file_name = $file->getClientOriginalName();
            $path = $request->file('sertif_url')->storeAs($destination_path, $file_name);

            $validatedData['sertif_url'] = $file_name;
        }

        // if ($request->has('skor') >= 400)
        // {
        //     $changeStatus = '1';
        //     $ValidatedData['is_payed'] = $changeStatus;
        // }

       Result::create($validatedData);
    

        return redirect('/menu-result')->with('success', 'Formulir Complete! Please Choose Your Test');
    }



}
