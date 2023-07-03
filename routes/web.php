<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FIleController;
use App\Http\Controllers\IdentityController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HeadStaffController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\isHeadStaff;
use GuzzleHttp\Middleware;

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

   Route::get('/signup-headStaff', 'signupheadStaff')->name('signupheadStaff')->middleware('guest');
   Route::post('/signup-headStaff', 'storeHeadStaff')->name('storeHeadStaff');

   Route::post('/logout', 'logout')->name('logout');
});

Route::controller(DashboardController::class)->group(function(){

Route::get('/dashboard-admin','indexAdmin')->name('indexAdmin')->middleware('admin');

Route::get('/landing-page','landing')->name('landing');
});

Route::controller(StaffController::class)->group(function(){
   Route::get('/dashboard-staff','indexStaff')->name('indexStaff')->middleware('staff');
   
   Route::get('/identity-staff','staffProfile')->name('staffProfile')->middleware('staff');

   Route::get('/edit-identity-staff/edit/{id}','editStaff')->name('editStaff')->middleware('staff');
   Route::post('/identity-staff/edit','staffSaveUp')->name('staffSaveUp')->middleware('staff');
   
   Route::get('/menu-report-staff','reportStaff')->name('reportStaff')->middleware('staff');
   Route::post('/menu-report-staff','saveReport')->name('saveReport')->middleware('staff');

   Route::get('/menu-staff-data','staff')->name('staff')->middleware('admin');
});

Route::controller(IdentityController::class)->group(function(){
   Route::get('/dashboard-participant','indexParticipant')->name('indexParticipant')->middleware('participant');
   
   Route::get('/menu-identity','showProfile')->name('showProfile')->middleware('participant');

   Route::get('/menu-identity/edit/{id}','editProfile')->name('editProfile')->middleware('participant');
   Route::post('/menu-identity-edit','saveOrUpdate')->name('saveOrUpdate')->middleware('participant');

   Route::get('/menu-participant-data','participant')->name('participant')->middleware('admin');
});

Route::controller(UserController::class)->group(function(){
   Route::get('/menu-user-data','user')->name('user')->middleware('admin');
   Route::get('/menu-user-data/status/{id}', 'showUser')->name('showUser')->middleware('admin');
   Route::post('/menu-user-data/status', 'unactive')->name('unactive')->middleware('admin');

   Route::get('/menu-account','account')->name('account')->middleware('auth');
   Route::post('/menu-account','updateAccount')->name('updateAccount')->middleware('auth');
});

Route::controller(ScheduleController::class)->group(function(){
   Route::get('/menu-schedule','schedule')->name('schedule')->middleware('staff');
   Route::post('/menu-schedule','store')->name('store')->middleware('staff');

   Route::get('/menu-schedule/edit/{id}','editSchedule')->name('editSchedule')->middleware('staff');
   Route::post('/menu-schedule/edit','updateSchedule')->name('updateSchedule')->middleware('staff');
});

Route::controller(PaymentController::class)->group(function(){
   Route::get('/menu-payment','payment')->name('payment')->middleware('staff');
   Route::get('/menu-payment/edit/{id}','editStatus')->name('editStatus')->middleware('staff');
   Route::post('/menu-payment/edit','updateStatus')->name('updateStatus')->middleware('staff');

   Route::put('/status/update/{id}', 'testStatus')->name('testStatus');

   Route::get('/menu-registrant','registrant')->name('registrant')->middleware('staff');

   Route::get('/menu-test','create')->name('create')->middleware('participant');

   Route::post('/menu-test','store')->name('store')->middleware('participant');
});

Route::controller(ResultController::class)->group(function(){
   Route::get('/test-card','testcard')->name('testcard')->middleware('participant');
   Route::get('/test-validation','testValidate')->name('testValidate')->middleware('participant');

   Route::get('/menu-result','result')->name('result')->middleware('staff');

   Route::get('/menu-result/edit/{id}','editResult')->name('editResult')->middleware('staff');
   Route::post('/menu-result/edit','updateResult')->name('updateResult')->middleware('staff');

   Route::get('/menu-announce','announce')->name('announce')->middleware('participant');
});

Route::controller(HeadStaffController::class)->group(function(){
   
   Route::get('/dashboard-headStaff','indexheadStaff')->name('indexheadStaff')->middleware('headStaff');
   
   Route::get('/identity-headstaff','headStaffProfile')->name('headStaffProfile')->middleware('headStaff');

   Route::get('/edit-identity-headstaff/edit/{id}','editHeadStaff')->name('editHeadStaff')->middleware('headStaff');
   Route::post('/identity-headstaff/edit','saveUpdate')->name('saveUpdate')->middleware('headStaff');
   
   Route::get('/menu-report','report')->name('report')->middleware('headStaff');

   Route::get('/menu-report/validate/{id}','validateReport')->name('validateReport')->middleware('headStaff');
   Route::post('/menu-report/validate','saveValidate')->name('saveValidate')->middleware('headStaff');

   Route::get('/menu-participants','participant')->name('participant')->middleware('headStaff');

   Route::get('/menu-participants/edit/{id}','editValidate')->name('editValidate')->middleware('headStaff');
   Route::post('/menu-participants/edit','updateValidate')->name('updateValidate')->middleware('headStaff');
});