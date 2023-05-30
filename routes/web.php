<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ScheduleController;

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



Route::controller(AuthController::class)->group(function(){
   Route::get('/login', 'signin')->name('login')->middleware('guest');
   Route::post('/login', 'authenticate')->name('signin');

   Route::get('/signup', 'signup')->name('signup')->middleware('guest');
   Route::post('/signup', 'store')->name('store');


   Route::get('/signup-staff', 'signupStaff')->name('signupStaff')->middleware('guest');
   Route::post('/signup-staff', 'storeStaff')->name('storeStaff');

   Route::post('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function(){
   Route::get('/test-card','card')->name('card');
   

});

Route::controller(DashboardController::class)->group(function(){

Route::get('/dashboard','index')->name('index')->middleware('auth');
Route::get('/landing-page','landing')->name('landing');

Route::get('/test-card','show')->name('show');

});

Route::controller(IdentityController::class)->group(function(){
   Route::get('/menu-identity','identity')->name('identity');
   Route::put('/menu-identity','edit')->name('edit');
   Route::post('/menu-identity', 'store')->name('store');

   Route::get('/menu-registrant','registrant')->name('registrant')->middleware('staff');
});

Route::controller(UserController::class)->group(function(){
   Route::get('/menu-user-data','user')->name('user')->middleware('admin');

   Route::get('/menu-account','account')->name('account')->middleware('auth');
   Route::get('/menu-account','edit')->name('edit');
});

Route::controller(ScheduleController::class)->group(function(){
   Route::get('/menu-schedule','schedule')->name('schedule')->middleware('staff');
   Route::post('/menu-schedule','store')->name('store');
});

Route::controller(PaymentController::class)->group(function(){
   Route::get('/menu-payment','payment')->name('payment')->middleware('staff');

   Route::get('/menu-test','create')->name('create');
   Route::post('/menu-test','store')->name('store');
});

Route::controller(ResultController::class)->group(function(){
   Route::get('/test-card','testcard')->name('testcard');

   Route::get('/menu-result','result')->name('result')->middleware('staff');
   Route::post('/menu-result','store')->name('store')->middleware('staff');

   Route::get('/menu-announce','announce')->name('announce');
});