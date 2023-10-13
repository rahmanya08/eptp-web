<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Identity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ScheduleController extends Controller
{
   
    //Function for display menu schedule include table data
    public function schedule ()
    {
            $schedules = Test::select('users.name' ,'tests.id','tests.date_test', 'tests.time_test', 'tests.status_test', 'tests.type_test', 'tests.quota')
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
   {    //dd($request->all());
        $validatedData = $request->validate([
         'date_test' => 'required|date',
         'time_test' => 'required',
         'type_test' => 'required',
         'quota'=> 'required'
        ]);  

        $testDate = Carbon::parse($request->input('date_test'));
        $today = Carbon::today();

        if ($testDate->isPast()) {
            return redirect('/menu-schedule')->with('failed', 'The Date Has Passed!');
        }

        $validatedData['staff_id'] = auth()->user()->id;
        $existSchedule = Test::where('date_test',$testDate)->first();
        
        if ($existSchedule) {
           
            return redirect('/menu-schedule')->with('failed', 'Schedule Already Added!');
        }
        else
        {
            Test::create($validatedData);
            return redirect('/menu-schedule')->with('success', 'Schedule Data Saved!');
        } 
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
       $status_test = $request->status_test;
       if (!$data) {

            return redirect('/menu-schedule')->with('failed', 'Data not found');

       }else if ($status_test === null) {

            return back()->with('failed', 'Please select a status');

       }else{

           $data->status_test = $status_test;
           $data->save();
           return redirect('/menu-schedule')->with('success', 'Status Changed');

       }
    }

}
