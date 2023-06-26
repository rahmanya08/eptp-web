<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Identity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ScheduleController extends Controller
{
   
    //Function for display menu schedule include table data
    public function schedule ()
    {
            $schedules = Test::select('users.name' ,'tests.id','tests.date_test', 'tests.status_test', 'tests.type_test')
            ->join('users', 'tests.staff_id', '=', 'users.id')
            ->orderBy('id', 'desc')
            ->get();

            $profile = Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get();
            return view('dashboard.staff.schedule', compact('schedules','profile'));
    }

  
   //Function for input schedule data
   public function store(Request $request)
   {
         $validatedData = $request->validate([
         'date_test'=> 'required|date',
         'type_test' => 'required'
      ]);  
      $validatedData['staff_id'] = auth()->user()->id;
      
      // dd($request->all());
      Test::create($validatedData);
         
      return redirect('/menu-schedule')->with('success', 'Schedule Data Saved!');
   }

   //Function for show the data will be change status
   public function editSchedule($id)
   {
       $test = Test::find($id);
       $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();
       return view('dashboard.staff.edit-schedule', compact('profile','test'));
   }


   //Function for change status of schedule to be expired
   public function updateSchedule(Request $request)
   {
       //dd($request->all());
       $data = Test::find($request->id);
       $data->status_test = $request->status_test;
       $data->save();

       return redirect('/menu-schedule')->with('success', 'Status Changed');
   }

}
