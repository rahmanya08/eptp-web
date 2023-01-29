<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('welcome');
});

Route::get('/test-register',function(){
    return view('test-register');
});

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/signup', [UserController::class, 'signup'])->name('signup');

Route::get('/test-card', [UserController::class, 'card'])->name('card');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/menu-schedule', [DashboardController::class, 'schedule'])->name('schedule');