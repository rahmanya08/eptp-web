<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Result;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function testcard()
    {
        return view('dashboard.participant.test-card ', [
            'title' => 'Test Card',
            'identities' => Identity::all(),
            'schedules' => Schedule::all(),
            'users' => User::all()

        ]);
    }

    public function result ()
    {
        return view('dashboard.staff.result ', [
            'title' => 'Result',
            'results' => Result::all(),
            'users' => User::all()
        ]);
    }

    public function announce ()
    {
        return view('dashboard.participant.announce ', [
            'title' => 'Announce',
            'results' => Result::select('skor')->where(auth()->user()->id)
        ]);
    }


    //Input Data Result
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' =>'required',
            'skor' =>'required',
            'sertif_url' =>'required','min:5','max:255'
        ]);  

        $validatedData['user_id'] = auth()->user()->id;
        if ($request->hasFile('sertif_url')) 
        {
            $destination_path = 'public/file/certif';
            $file = $request->file('sertif_url');
            $file_name = $file->getClientOriginalName();
            $path = $request->file('sertif_url')->storeAs($destination_path, $file_name);

            $validatedData['sertif_url'] = $file_name;
        }


       Result::create($validatedData);
    

        return redirect('/menu-result')->with('success', 'Formulir Complete! Please Choose Your Test');
    }



}
