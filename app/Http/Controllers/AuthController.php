<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller
{
    public function signin()
    {
        return view('login.signin', [
            'title' => 'Login'
        ]);
    }

    //Sign-up for paticipant account
    public function signup()
    {
        return view('signup.signup', [
            'title' => 'SignUp'
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>'required','min:5','max:255',
            'email'=> 'required','email:dns','unique:users',
            'password'=>'required','min:5','max:255',
        ]);  
        
        $validatedData['role']='student';
        // $validatedData['role']='admin';

        $validatedData['password'] = Hash::make($validatedData['password']);

        //dd ($validatedData);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successfull! Please Login');
    }
    

    //Sign-up for Head staff account
    public function signupheadStaff()
    {
        return view('signup.signup-headstaff', [
            'title' => 'SignUp'
        ]);
    }

    //Input Data Akun
    public function storeHeadStaff(Request $request)
    {
        $validatedData = $request->validate([
        'name' =>'required','min:5','max:255',
        'email'=> 'required','email:dns','unique:users',
        'password'=>'required','min:5','max:255',
        ]);  
            
        $validatedData['role']='headStaff';
    
        $validatedData['password'] = Hash::make($validatedData['password']);
        //dd ($validatedData);
    
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successfull! Please Login');
    }



    //Sign-up for staff account
    public function signupStaff()
    {
        return view('signup.signup-staff', [
            'title' => 'SignUp'
        ]);
    }

    //Input Data Akun
    public function storeStaff(Request $request)
    {
        $validatedData = $request->validate([
        'name' =>'required','min:5','max:255',
        'email'=> 'required','email:dns','unique:users',
        'password'=>'required','min:5','max:255',
        ]);  
            
        $validatedData['role']='staff';
    
        $validatedData['password'] = Hash::make($validatedData['password']);
        //dd ($validatedData);
    
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successfull! Please Login');
    }

    //Autentikasi
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'admin')
            {
                return redirect()->intended('/dashboard-admin');
            }
            elseif (auth()->user()->role == 'staff')
            {
                return redirect()->intended('/dashboard-staff');
            }
            elseif (auth()->user()->role == 'headStaff')
            {
                return redirect()->intended('/dashboard-headStaff');
            }
            else
            {
                return redirect()->intended('/dashboard-participant');
            }
            
        }
 
        return back()->with('LoginErorr', 'Login Failed!');
    }

    //Logout
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
        
    }

    public function checkName(Request $request)
    {
        //
    }
}
