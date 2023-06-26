<?php

namespace App\Http\Controllers;

use App\Models\DetailTest;
use App\Models\Identity;
use App\Models\Test;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\PDF;


class ResultController extends Controller
{
    public function testcard()
    {
        
        $data = DetailTest::select('detail_tests.id','detail_tests.created_at', 'detail_tests.date_validation', 'tests.date_test','detail_tests.participant_id')
        ->join('tests','tests.id', '=', 'detail_tests.test_id')
        ->join('users', 'detail_tests.participant_id', '=','users.id')
        ->where('users.id', auth()->user()->id)
        ->where('tests.status_test', true)
        ->get();

        $users = User::select('users.name', 'identities.birth_date', 'identities.gender','identities.identity_type', 'identities.identity_num')
        ->join('identities' ,'identities.user_id' ,'=' ,'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $headstaff = User::select('users.name','identities.identity_num')
        ->join('identities' ,'identities.user_id' ,'=' ,'users.id')
        ->where('role', 'headStaff')
        ->get();

        return view('dashboard.participant.test-card ', compact('data','users','profile','headstaff'));
    }

    
    public function result ()
    {
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $detail_tests = DetailTest::select('detail_tests.id','users.name', 'detail_tests.skor', 'detail_tests.sertif_url', 'detail_tests.is_passed')
        ->join('users', 'users.id','=', 'detail_tests.participant_id' )
        ->orderBy('id', 'asc')
        ->get();

       
        $users = User::select('detail_tests.participant_id','users.name')->join('detail_tests' , 'users.id','=','detail_tests.participant_id')
        ->get();

        return view('dashboard.staff.result', compact('profile','detail_tests','users') );
    }
    
    public function announce ()
    {
                    
        $results = DetailTest::select('detail_tests.skor','detail_tests.sertif_url','detail_tests.is_passed')
        ->join('tests','tests.id', '=', 'detail_tests.test_id')
        ->join('users', 'detail_tests.participant_id', '=', 'users.id')
        ->where('tests.status_test', false)
        ->where('participant_id', auth()->user()->id)
        ->get();

        $skor = DetailTest::select('skor')
        ->where('participant_id', auth()->user()->id)
        ->get();

        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();
        return view('dashboard.participant.announce ', compact('results','profile','skor'));
    }


    // public function store(Request $request)
    // {
    //     //dd($request->all());
    //     $validatedData = $request->validate([
    //         'skor' =>'required',
    //         'sertif_url' =>'required','min:5','max:255',
    //         'result_status' => 'required'
    //     ]);  

    //     if ($request->hasFile('sertif_url')) 
    //     {
    //         $destination_path = 'public/file/certif';
    //         $file = $request->file('sertif_url');
    //         $file_name = $file->getClientOriginalName();
    //         $path = $request->file('sertif_url')->storeAs($destination_path, $file_name);

    //         $validatedData['sertif_url'] = $file_name;
    //     }

    //     $data = DetailTest::find($request->id);
    //     $data->result_status = $request->result_status;
    //     $data->save();
    

    //     return redirect('/menu-result')->with('success', 'Formulir Complete! Please Choose Your Test');
    // }

   //This function for show data participant whoes finished the test
   public function editResult($id)
   {
       $data = DetailTest::find($id);

       $users = User::select('users.name')
       ->join('detail_tests' , 'detail_tests.participant_id','=','users.id')
       ->where('is_payed', '1')
       ->where('detail_tests.id' , $id)
       ->get();

       $profile = Identity::select('image')
       ->join('users', 'identities.user_id', '=', 'users.id')
       ->where('user_id', auth()->user()->id)
       ->get();
       return view('dashboard.staff.edit-result', compact('data', 'users', 'profile'));
   }

   //This function for update data participant result, where participant finished the test
   public function updateResult(Request $request)
   {
       //dd($request->all());    
    
       $data = DetailTest::find($request->id);
       $data->skor = $request->skor;
       $data->is_passed = $request->is_passed;
       $data->sertif_url = $request->sertif_url;
       if ($request->hasFile('sertif_url')) 
       {
           $destination_path = 'public/file/certif';
           $file = $request->file('sertif_url');
           $file_name = $file->getClientOriginalName();
           $path = $request->file('sertif_url')->storeAs($destination_path, $file_name);

           $data['sertif_url'] = $file_name;
       }
       $data->save();

       return redirect('/menu-result')->with('success', 'Result Updated');
   }
}
