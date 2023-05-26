<?php

namespace App\Http\Controllers;

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

    public function payment ()
    {
        return view('dashboard.payment', [
            'title' => 'Payment'
        ]);
    }

    public function registrant ()
    {
        return view('dashboard.registrant', [
            'title' => 'Registrant'
        ]);
    }

    public function announce ()
    {
        return view('dashboard.announce ', [
            'title' => 'Announcement '
        ]);
    }

    public function result ()
    {
        return view('dashboard.result ', [
            'title' => 'Announcement'
        ]);
    }

    public function account ()
    {
        return view('dashboard.account ', [
            'title' => 'Account'
        ]);
    }

    public function course ()
    {
        return view('dashboard.course ', [
            'title' => 'Course'
        ]);
    }

    public function landing ()
    {
        return view('landing.index', [
            'title' => 'Home'
        ]);
    }
}
