<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    public function user ()
    {
        return view('dashboard.admin.user', [
            'title' => 'User',
            'users' => User::all()

        ]);
    }

    
    public function account ()
    {
        return view('dashboard.account ', [
            'title' => 'Account'
        ]);
    }

    public function updateAccount(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' =>'required','min:5','max:255',
            'email'=> 'required','email:dns','unique:users',
            'password'=>'min:5','max:255',
        ]);  
        
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ( ! $request->input('password') == null)
        {
            $user->password = bcrypt($request->input('password'));
        }
        auth()->user()->update($validatedData);
    
        return redirect('/logout')->with('success', 'User Account Updated!');
    }
    
}