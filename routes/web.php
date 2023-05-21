<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\ScheduleController;
use App\Models\Identity;

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

/* Route::get('/', function () {
   return view('welcome');
});*/



Route::controller(AuthController::class)->group(function(){
   Route::get('/login', 'signin')->name('login')->middleware('guest');
   Route::post('/login', 'authenticate')->name('signin');

   Route::get('/signup', 'signup')->name('signup')->middleware('guest');
   Route::post('/signup', 'store')->name('store');

   Route::post('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function(){
   Route::get('/test-card','card')->name('card');
   Route::get('/test-card','card')->name('card');

});

Route::controller(IdentityController::class)->group(function(){
   Route::get('/test-register', 'test')->name('test');
   Route::post('/test-register', 'store')->name('store');
});

Route::controller(DashboardController::class)->group(function(){

Route::get('/dashboard','index')->name('index')->middleware('auth');
Route::get('/menu-schedule','schedule')->name('schedule');
Route::get('/menu-user-data','user')->name('user');
Route::get('/menu-payment','payment')->name('payment');
Route::get('/menu-registrant','registrant')->name('registrant');
Route::get('/menu-announce','announce')->name('announce');
Route::get('/menu-account','account')->name('account');
Route::get('/menu-result','result')->name('result');
Route::get('/menu-course','course')->name('course');

Route::get('/landing-page','landing')->name('landing');

});


Route::resource('identity', IdentityController::class)->middleware('auth');