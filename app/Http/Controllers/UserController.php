<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

    public function edit(User $user)
    {
        return view('dashboard.account ', [
            'user' => $user
            // 'users' => User::all()
        ]);
    }
}
