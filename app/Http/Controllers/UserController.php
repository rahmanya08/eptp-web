<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function signup ()
    {
        return view('signup');
    }

    public function login ()
    {
        return view('login');
    }

    public function card ()
    {
        return view('test-card');
    }
}
