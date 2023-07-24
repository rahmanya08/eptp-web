<?php

namespace App\Http\Controllers;

use App\Models\DetailTest;
use App\Models\Identity;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{

    public function indexStaff()
    {   
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $regist = DetailTest::count('participant_id');
        $schedule = Test::where('status_test','1')->count();
        
        return view('dashboard.staff.index', compact('profile','regist','schedule'));
    }

    public function staffProfile()
    {
        $id = Auth::user()->id;
        $data = Identity::select( 'users.name', 'users.email', 'identities.image', 'identities.gender',
        'identities.birth_date', 'identities.identity_num', 'identities.phone', 'identities.address', 'identities.position')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('identities.user_id', $id)
        ->get();
        return view('dashboard.staff.identity-staff', compact('data'));
    }

    public function editStaff($id)
    {
        $user = User::with('user_identity')->find(auth()->user()->id);
        $data = Identity::select( 'users.name', 'users.email', 'identities.image', 'identities.gender',
        'identities.birth_date', 'identities.identity_num', 'identities.phone', 'identities.address', 'identities.position')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('identities.user_id', $id)
        ->get();
        return view('dashboard.staff.edit-identity-staff',[
            'users' => User::all(),
            'user'=>$user,
            'data'=>$data
        ]);
    
    }


    public function staffSaveUp(Request $request)
    {
        
        //dd($request->all());
        $validatedData = $request->validate([

            'image' =>'required',
            'gender'=>'required',
            'birth_date' =>'required','date',
            'identity_num'=>'required','min:9','max:20',
            'phone'=>'required','min:12','max:13',
            'address'=>'required','min:15','max:255',
            'position'=>'required','min:9','max:16'
        ]);  
        
        $validatedData['user_id'] = auth()->user()->id;
        if ($request->hasFile('image')) 
            {
                $destination_path = 'public/images/users';
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs($destination_path, $image_name);
                
                $validatedData['image'] = $image_name;
            }
    
        $record = Identity::find($request->id);
        if ($record) {
            $record->update($validatedData);
        } else {
            Identity::create($validatedData);
        }
    
        return redirect('/identity-staff')->with('success', 'Profile Updated');   
    }
    
    public function staff ()
    {
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $staff = Identity::select('users.name' ,'identities.gender', 'identities.birth_date', 'identities.identity_type', 
        'identities.identity_num', 'identities.phone', 'identities.address', 'identities.position')
        ->join('users' ,'identities.user_id','=', 'users.id')
        ->where('role' , 'staff')
        ->get();

        return view('dashboard.admin.staff', compact('profile','staff'));
    }

    //Report By Staff
    public function reportStaff ()
    {
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $reports = Test::select('users.name', 'tests.id','tests.date_test', 'tests.report', 'tests.date_report')
        ->join('users', 'users.id' ,'=','tests.staff_id')
        ->orderby('report')
        ->get();

        $headstaff = User::select('users.name')
        ->where('role', 'headstaff')
        ->get();

        $users = User::select('detail_tests.participant_id','users.name')
        ->join('detail_tests' , 'users.id','=','detail_tests.participant_id')
        ->get();

        $tests = Test::where('staff_id', auth()->user()->id)
        ->where('status_test', true)
        ->where('report', false)
        ->get();

        return view('dashboard.staff.report-staff', compact('profile','reports','users','tests','headstaff') );
    }

    public function Reported($id)
    {
        $test = Test::find($id);

        $profile = Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get();
    
        $info = Test::select('users.name', 'tests.id','tests.date_test', 'tests.report', 'tests.date_report')
            ->join('users', 'users.id' ,'=','tests.staff_id')
            ->where('tests.id', $id)
            ->get();

        $headstaff = User::select('users.name')
        ->where('role', 'headstaff')
        ->get();

        $reports = DetailTest::select('users.name', 'identities.category', 'identities.study_program', 'detail_tests.registration',
        'detail_tests.skor', 'detail_tests.is_passed')
        ->join('tests', 'detail_tests.test_id','=','tests.id')  
        ->join( 'users', 'detail_tests.participant_id','=','users.id')
        ->join('identities' , 'identities.user_id', '=', 'users.id' )
        ->where('detail_tests.test_id', $id)
        ->get();

        return view('dashboard.staff.staff-reporting', compact('profile','test','reports','info','headstaff'));
    }

    public function saveReport(Request $request)
    {
        $dateTestId = $request->input('date_test');
        $selectedTest = Test::find($dateTestId);

        if ($selectedTest) {
            $selectedTest->report = true;
            $selectedTest->save();
        }

        return redirect('/menu-report-staff')->with('success', 'Already Report!');
    }

}
