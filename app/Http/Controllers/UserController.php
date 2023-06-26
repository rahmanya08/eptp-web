<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Identity;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{

    public function user ()
    {
        return view('dashboard.admin.user', [
            'title' => 'User',
            'identities' => Identity::select('image')
            ->join('users', 'identities.user_id', '=', 'users.id')
            ->where('user_id', auth()->user()->id)
            ->get(),
            'users' => User::all()

        ]);
    }

    //Edit Status 
    public function showUser($id)
    {

        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $users = User::all();
        $data = User::find($id);
        return view('dashboard.admin.edit-user',compact('profile','data','users'));
    }

    //Update Status 
    public function unactive(Request $request)
    {
        


        //dd($request->all());
        $data = User::find($request->id);
        $data->status_user = $request->status_user;
        $data->save();

        return redirect('/menu-user-data')->with('success', 'User Status Changed!');
        
    }
    
    public function account ()
    {
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        return view('dashboard.account ',compact('profile'));
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