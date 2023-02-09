<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    public function dashboard ()
    {
        return view('dashboard');
    }

    public function schedule ()
    {
        return view('schedule');
    }

    public function user_ver ()
    {
        return view('user_ver');
    }

    public function payment ()
    {
        return view('payment');
    }

    public function registrant ()
    {
        return view('registrant');
    }

    public function announce ()
    {
        return view('announce');
    }

    public function result ()
    {
        return view('result');
    }

    public function account ()
    {
        return view('account');
    }

    public function course ()
    {
        return view('course');
    }
}
