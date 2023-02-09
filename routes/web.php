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


Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/signup', [UserController::class, 'signup'])->name('signup');

Route::get('/test-card', [UserController::class, 'card'])->name('card');

Route::get('/test-register', [UserController::class, 'test_register'])->name('test-register');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/menu-schedule', [DashboardController::class, 'schedule'])->name('schedule');

Route::get('/menu-user-data', [DashboardController::class, 'user_ver'])->name('user_ver');

Route::get('/menu-payment', [DashboardController::class, 'payment'])->name('payment');

Route::get('/menu-registrant', [DashboardController::class, 'registrant'])->name('registrant');

Route::get('/menu-announce', [DashboardController::class, 'announce'])->name('announce');

Route::get('/menu-account', [DashboardController::class, 'account'])->name('account');

Route::get('/menu-result', [DashboardController::class, 'result'])->name('result');

Route::get('/menu-course', [DashboardController::class, 'course'])->name('course');