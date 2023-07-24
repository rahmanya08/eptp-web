<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DetailTest;
use App\Models\Identity;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeadStaffController extends Controller
{

    public function indexheadStaff()
    {   
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $regist = DetailTest::count('participant_id');
        $payment = DetailTest::where('is_payed','1')->count('participant_id');
        $schedule = Test::where('status_test','1')->count();


        $tb_schedule = Test::select('tests.date_test', 'tests.type_test', 'tests.status_test','users.name')
        ->join('users','tests.staff_id','=','users.id')
        ->where('tests.status_test', false)
        ->orderBy('tests.id', 'desc')
        ->get();
        return view('dashboard.headstaff.index', compact('profile','regist','schedule','payment','tb_schedule'));
    }

    public function headStaffProfile()
    {
        $id = Auth::user()->id;
        $data = Identity::select( 'users.name', 'users.email', 'identities.image', 'identities.gender',
        'identities.birth_date', 'identities.identity_num', 'identities.phone', 'identities.address', 'identities.position')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('identities.user_id', $id)
        ->get();
        return view('dashboard.headstaff.identity-headstaff', compact('data'));
    }

    public function editHeadStaff($id)
    {
        $user = User::with('user_identity')->find(auth()->user()->id);
        $data = Identity::select( 'users.name', 'users.email', 'identities.image', 'identities.gender',
        'identities.birth_date', 'identities.identity_num', 'identities.phone', 'identities.address', 'identities.position')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('identities.user_id', $id)
        ->get();
        return view('dashboard.headstaff.edit-identity-headstaff',[
            'users' => User::all(),
            'user'=>$user,
            'data'=>$data
        ]);
    
    }


    public function saveUpdate(Request $request)
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
    
        return redirect('/identity-headstaff')->with('success', 'Profile Updated');   
    }
    
    public function report (Request $request)
    {
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $reports = Test::select('users.name', 'tests.id','tests.date_test', 'tests.report', 'tests.date_report')
        ->join('users', 'users.id' ,'=','tests.staff_id')
        ->get();

        $headstaff = Test::select('users.name')
        ->join('tests ', 'users.id', '=', 'tests.report_validator')
        ->get();

        $users = User::select('detail_tests.participant_id','users.name')
        ->join('detail_tests' , 'users.id','=','detail_tests.participant_id')
        ->get();

        return view('dashboard.headstaff.report-headstaff', compact('profile','users','reports','headstaff') );
    }

    public function validateReport($id)
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
        ->where('tests.report', true) 
        ->get();

        return view('dashboard.headstaff.validate-report', compact('profile','test','reports','info','headstaff'));
    }

    public function saveValidate(Request $request)
    {
        $testId = $request->input('test_id');
        $test = Test::find($testId);
        if (!$test) {
            return redirect()->back()->with('error', 'Staff Did Not Reported!');
        }
    
        $isChecked = $request->has('checkbox');
    
        if ($isChecked) {
            $test->date_report = now()->toDateString();
            $test->report_validator = auth()->user()->id;
        } else {
            $test->date_report = null;
        }
    
        $test->save();
        return redirect('/menu-report')->with('success', 'Report Validated');
    }

    /**
     * This function for validate test card
     * Head staff will see list of participant who is paid and then the head staff will check the data of participant
     * when check the data, head staff will check for validate participant
     * if checked, the participant vaidated then can downlooad test card with 
     * date validation.
     */
    public function participant ()
    {
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $tb_regist = DetailTest::select('users.id','users.name', 'identities.image' ,'tests.date_test',
        'detail_tests.id','detail_tests.registration','detail_tests.is_payed','detail_tests.date_validation','detail_tests.validator')
        ->join( 'tests' , 'tests.id' ,'=' ,'detail_tests.test_id' )
        ->join('users' ,'users.id' ,'=' ,'detail_tests.participant_id')
        ->join('identities' , 'users.id', '=' ,'identities.user_id')
        ->where('is_payed', true)
        ->where('tests.status_test', false)
        ->get();
       
        $users = User::select('detail_tests.participant_id','users.name')->join('detail_tests' , 'users.id','=','detail_tests.participant_id')
        ->get();

        return view('dashboard.headstaff.participant', compact('profile','tb_regist','users') );
    }

    public function editValidate($id)
    {
        $test = DetailTest::find($id);

        $tb_regist = DetailTest::select('users.id','users.name', 'identities.image' ,'tests.date_test',
        'detail_tests.id','detail_tests.registration','detail_tests.is_payed','detail_tests.date_validation')
        ->join( 'tests' , 'tests.id' ,'=' ,'detail_tests.test_id' )
        ->join('users' ,'users.id' ,'=' ,'detail_tests.participant_id')
        ->join('identities' , 'users.id', '=' ,'identities.user_id')
        ->where('detail_tests.id', $id)
        ->get();

        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();        

        return view('dashboard.headstaff.validate-card ', compact('tb_regist','profile','test'));
    }

    public function updateValidate(Request $request)
    {
        $testId = $request->input('detailtests_id');
        $test = DetailTest::find($testId);
        if (!$test) {
            return redirect()->back()->with('error', 'There is No This Participant');
        }
    
        $isChecked = $request->has('checkbox');
        if ($isChecked) {
            $test->date_validation = now()->toDateString();
            $test->validator = auth()->user()->id;
        } else {
            $test->date_validation = null;
            $test->validator = null;
        }
    
        $test->save();
        return redirect('/menu-participants')->with('success', 'Participant Validated');
    }
}
