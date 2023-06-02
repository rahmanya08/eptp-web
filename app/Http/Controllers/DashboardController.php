<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{

    public function index ()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function landing ()
    {
        return view('landing.index', [
            'title' => 'Home'
        ]);
    }
}
