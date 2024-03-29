<?php

namespace App\Http\Controllers;

use App\Models\DetailTest;
use App\Models\Identity;
use App\Models\Test;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\PDF;


class ResultController extends Controller
{
    public function testcard()
    {
        
        $data = DetailTest::select('detail_tests.registration', 'detail_tests.date_validation', 'tests.date_test','detail_tests.participant_id')
        ->join('tests','tests.id', '=', 'detail_tests.test_id')
        ->join('users', 'detail_tests.participant_id', '=','users.id')
        ->where('users.id', auth()->user()->id)
        ->where('tests.status_test', false)
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
        ->join('identities' ,'users.id','=' ,'identities.user_id')
        ->where('role','headstaff')
        ->get();

        return view('dashboard.participant.test-card ', compact('data','users','profile','headstaff'));
    }

    
    public function result (Request $request)
    {
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $detail_tests = DetailTest::select('users.name','identities.study_program', 'detail_tests.id', 'detail_tests.registration', 'identities.category',
        'detail_tests.skor','detail_tests.sertif_url','detail_tests.is_passed','detail_tests.present')
        ->join('users', 'users.id','=', 'detail_tests.participant_id')
        ->join('identities','users.id','=','identities.user_id')
        ->orderBy('id', 'asc')
        ->get();

        $schedule = Test::select('date_test')
        ->where('status_test', true)
        ->where('report',false)
        ->get();

        $name = $request->input('name');

        $list = DetailTest::select('users.name', 'tests.status_test','detail_tests.id')
        ->join('users','detail_tests.participant_id','=','users.id')
        ->join('tests','detail_tests.test_id','=','tests.id')
        ->where('tests.status_test', true)
        ->where('detail_tests.present',false)
        ->get();


        $id = DetailTest::select('detail_tests.id')
            ->join('users', 'detail_tests.participant_id', '=', 'users.id')
            ->value('detail_tests.id');

        $users = User::select('detail_tests.participant_id','users.name')->join('detail_tests' , 'users.id','=','detail_tests.participant_id')
        ->get();

        //return response()->json(['id' => $id]);
        return view('dashboard.staff.result', compact('profile','detail_tests','users','list','schedule','id') );
    }
    
    public function announce ()
    {
                    
        $results = DetailTest::select('detail_tests.skor','detail_tests.sertif_url','detail_tests.is_passed','detail_tests.date_validation')
        ->join('tests','tests.id', '=', 'detail_tests.test_id')
        ->join('users', 'detail_tests.participant_id', '=', 'users.id')
        ->where('tests.status_test', true)
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


    public function store(Request $request)
    {
        //dd($request->all());

        $data = DetailTest::find($request->id);
        $attendance = $request->present;
        $data->present = $attendance;
        $data->save();

        return redirect('/menu-result')->with('success', 'Add Perticipant Result');
    }

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
       $request->validate([
        'skor' => 'required',
        ]);
       $data = DetailTest::find($request->id);
       $skor = $request->skor;

       $data->skor = $skor;
       $data->is_passed = $skor >= 400 ? 1 : 0;
       $data->sertif_url = $request->sertif_url;

       if ($request->hasFile('sertif_url')) {
            $file = $request->file('sertif_url');
            $fileSizeInMb = $file->getSize() / (1024 * 1024); // Konversi ukuran file ke MB
            if($fileSizeInMb > 5){
                return back()->with('failed', 'Ukuran file terlalu besar.');
            }
                $destination_path = 'public/file/certif';
                $file = $request->file('sertif_url');
                $file_name = $file->getClientOriginalName();
                $path = $request->file('sertif_url')->storeAs($destination_path, $file_name);

                $data['sertif_url'] = $file_name;
       }
       $data->save();

       return redirect('/menu-result')->with('success', 'Result Updated');
   }


   public function testValidate()
   {
        return view('partials.modal-popup');
   }

}
