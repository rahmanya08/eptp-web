<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IdentityController extends Controller
{
    
        public function identity ()
        {
            return view('dashboard.identity');
        }

        //Input Data Akun
        public function store(Request $request)
        {
            //return $request;
            $validatedData = $request->validate([
                //'user_id',
                'name' =>'required','min:5','max:255',
                'img_url' =>'required','min:5','max:255',
                'birth_date' =>'required','min:5','max:50',
                'gender'=>'required','min:5','max:255',
                'identity_type'=>'required','min:5',
                'identity_num'=>'required','min:9','max:16',
                'phone'=>'required','min:12','max:13',
                'address'=>'required','min:15','max:255',
                'category'=>'required','min:20',
                'major'=>'required','min:5','max:20',
                'study_program'=>'required','min:5','max:20',
                'semester'=>'required','max:1',
                //'jabatan'=>'required','min:5','max:20',
                //'status_identitas'
            ]);  

            Identity::create($validatedData);
        

            return redirect('/menu-course')->with('success', 'Formulir Complete! Please Choose Your Test');
        }

 
  
}
