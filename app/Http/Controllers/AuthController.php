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

    public function signup()
    {
        return view('signup.signup', [
            'title' => 'SignUp'
        ]);
    }

    //Input Data Akun
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email'=> 'required','email:dns','unique:users',
            'password'=>'required','min:5','max:255'
        ]);  

        //$validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
    

        return redirect('/login')->with('success', 'Registration successfull! Please Login');
    }

    //Autentikasi
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard');
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
}
