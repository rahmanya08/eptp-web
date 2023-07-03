<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{

    public function indexAdmin ()
    {
        $profile = Identity::select('image')
        ->join('users', 'identities.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->get();

        $users = User::count('id');
        return view('dashboard.index',compact('profile', 'users' ));
    }

    public function landing ()
    {
        // SELECT id, date_test, (SELECT COUNT(*) FROM detail_tests WHERE detail_tests.test_id = tests.id) AS testDetails_count FROM tests;
        $schedules = Test::with(['detail_tests' => function ($query) {
            $query->select('test_id')->groupBy('test_id');
        }])
        ->withCount('detail_tests')
        ->where('status_test', false)
        ->get(['date_test', 'detail_tests_count']);

        return view('landing.index',compact('schedules'));
    }
}
