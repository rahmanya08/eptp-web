<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class IdentityController extends Controller
{

        public function indexParticipant ()
        {
            return view('dashboard.participant.index', [
                'title' => 'Dashboard',
                'identities' => Identity::select('image')
                ->join('users', 'identities.user_id', '=', 'users.id')
                ->where('user_id', auth()->user()->id)
                ->get(),
            ]);
        }
        
        public function participant ()
        {
            $participant = Identity::select('users.name','identities.gender', 'identities.birth_date', 'identities.identity_type', 'identities.identity_num',
            'identities.category', 'identities.major', 'identities.study_program', 'identities.semester', 'identities.phone', 'identities.phone', 'identities.address')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('role', 'student')
            ->get();

            $profile = Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get();

            return view('dashboard.admin.participant', compact('profile', 'participant'));
        }

        public function showProfile ()
        {
            $id = Auth::user()->id;
            $data = Identity::select( 'users.name', 'users.email', 'identities.image', 'identities.gender', 'identities.identity_type',
            'identities.birth_date', 'identities.identity_num', 'identities.category','identities.major','identities.study_program','identities.semester',
            'identities.phone', 'identities.address', 'identities.position')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('identities.user_id', $id)
            ->where('users.role', 'student')
            ->get();
            return view('dashboard.participant.identity', compact('data'));
        }

        public function editProfile($id)
        {
            $user = User::with('user_identity')->find(auth()->user()->id);
            $data = Identity::select( 'users.name', 'users.email', 'identities.image', 'identities.gender',
            'identities.birth_date', 'identities.identity_num', 'identities.phone', 'identities.address', 'identities.position')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('identities.user_id', $id)
            ->get();
            return view('dashboard.participant.identity-edit',[
                'users' => User::all(),
                'user'=>$user,
                'data'=>$data
            ]);
        }   



        //Function for save or update data 
        public function saveOrUpdate(Request $request)
        {
            //dd($request->all());
            $validatedData = $request->validate([
                
                'image' => 'required','max:2048',
                'gender'=>'required',
                'birth_date' =>'required','date',
                'identity_type'=>'required',
                'identity_num'=>'required','min:9','max:20',
                'category'=>'required',
                'major'=>'required','min:5','max:20',
                'study_program'=>'required','min:5','max:20',
                'semester'=>'required','max:1',
                'phone'=>'required','min:12','max:13',
                'address'=>'required','min:15','max:255'
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
            //dd($request->all());
            if ($record) {
                $record->update($validatedData);
            } else {
                Identity::create($validatedData);
            }

            return redirect('/menu-identity')->with('success', 'Profile Updated!');

        }
}
