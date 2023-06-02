<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{

        public function index ()
        {
            return view('dashboard.staff.index', [
                'title' => 'Dashboard'
            ]);
        }
        public function identityStaff ()
        {
            return view('dashboard.staff.identity-staff', [
                'title' => 'Identity',
            ]);
            
        }

        public function staff ()
        {
            return view('dashboard.admin.staff', [
                'title' => 'Staff',
                'identities' => Identity::all(),
                'users' => User::select('name')->join('identities', 'users.id', '=', 'identities.user_id' )->get()
            ]);
        }

        //Input Data Identitas Staff
        public function store(Request $request)
        {
            //dd($request->all());
            $validatedData = $request->validate([
                
                'image' =>'required','min:5','max:255',
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


            Identity::create($validatedData);

            return redirect('/dashboard')->with('success', 'Formulir Complete! Please Choose Your Test');
        }

                // public function edit(Identity $identity)
                // {
                //     return view('dashboard.account ', [
                //         'user' => $identity
                //         // 'users' => User::all()
                //     ]);
                // }
 
  
}
