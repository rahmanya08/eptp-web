<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ScheduleController extends Controller
{
   
   public function schedule ()
   {
       return view('dashboard.schedule', [
           'title' => 'Schedule',
           'schedules' => Schedule::all()
           
       ]);
   }

   public function store(Request $request)
   {
      //return $request;
      $validatedData = $request->validate([
         'date_test'=> 'required',
         'type_test' => 'required'
      ]);  


      Schedule::create($validatedData);
   

      return redirect('/schedule')->with('success', 'Schedule Data Saved!');
   }

}
