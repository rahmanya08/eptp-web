<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ScheduleController extends Controller
{
   
   public function schedule ()
   {
       return view('dashboard.staff.schedule', [
           'title' => 'Schedule',
           'schedules' => Schedule::all()
           
       ]);
   }

   public function store(Request $request)
   {
         $validatedData = $request->validate([
         'date_test'=> 'required|date',
         'type_test' => 'required'
      ]);  

      // dd($request->all());

      Schedule::create($validatedData);
         
      return redirect('/menu-schedule')->with('success', 'Schedule Data Saved!');
   }

}
