<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{

    public function show()
    {
        return view('dashboard.participant.test-card', [
            'identities' => Identity::all()
        ]);
    }
    public function index ()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    }

    public function announce ()
    {
        return view('dashboard.participant.announce ', [
            'title' => 'Announcement '
        ]);
    }

    public function account ()
    {
        return view('dashboard.account ', [
            'title' => 'Account'
        ]);
    }


    public function landing ()
    {
        return view('landing.index', [
            'title' => 'Home'
        ]);
    }
}
