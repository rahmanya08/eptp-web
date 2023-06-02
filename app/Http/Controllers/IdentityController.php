<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IdentityController extends Controller
{

        public function index ()
        {
            return view('dashboard.participant.index', [
                'title' => 'Dashboard'
            ]);
        }
        public function identity ()
        {
            return view('dashboard.participant.identity', [
                'title' => 'Identity',
            ]);
            
        }

        public function participant ()
        {
            return view('dashboard.admin.participant', [
                'title' => 'Participant',
                'identities' => Identity::all()->where('position', '=', null),
                'users' => User::select('name')->join('identities', 'users.id', '=', 'identities.user_id' )->get()
            ]);
        }
        
        //Input Data Identitas
        public function store(Request $request)
        {
            //dd($request->all());
            $validatedData = $request->validate([
                
                'image' =>'required','min:5','max:255',
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


            Identity::create($validatedData);
            return redirect('/menu-test')->with('success', 'Formulir Complete! Please Choose Your Test');

            // if (auth()->user()->role == 'staff')
            // {
            //     return redirect('/dashboard')->with('success', 'Thanks for Completed Data!');
            // }
            // else
            // {
            //     return redirect('/menu-test')->with('success', 'Formulir Complete! Please Choose Your Test');
            // }

        }

        public function edit(Identity $identity)
        {
            return view('dashboard.account ', [
                'user' => $identity
                // 'users' => User::all()
            ]);
        }
 
  
}
