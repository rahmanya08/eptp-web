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
}
