<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{

    public function card ()
    {
        return view('test.test-card', [
            'title' => 'Test Card'
        ]);
    }
}
