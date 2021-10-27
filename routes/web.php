<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\registerController2;
use App\Models\User;
use App\Models\User as Model;
use Illuminate\Support\Facades\DB;

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
    return view('home');
});

// Route::get('/schedule', function () {
//     return view('schedule');
// });

//Route::get('/schedule',[ScheduleController::class, 'getSchedules'])->name('schedule.chosen');
//Route::get('schedule',[ScheduleController::class, 'scheduleChosen'])->name('test');

// Route::put('schedule', [ScheduleController::class, 'scheduleChosen'])->name('schedule.chosen');

// Route::get('/schedule', function () {

//     $petani = DB::table('schedules')->get();

//     return view('schedule', ['schedule' => $schedule]);
// });

Route::get('/schedule', [ScheduleController::class, 'index']);

Route::post('/schedule', [ScheduleController::class, 'display']);

Route::get('/map', function () {
    return view('map');
});

Route::get('/support', function () {
    return view('support');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/verify', function () {
    return view('auth.verify');
});

Route::get('/reset', function () {
    return view('auth.reset');
});

Route::get('/login', function () {
    return view('auth.login');
});
Auth::routes(['verify' => true]);

Route::get('logout', '\App\Http\Controllers\Auth\LogoutController@logout');

Route::resource('/register', registerController2::class);

Route::get('/email/verify', function () {
    return view('auth.verify');
});

Route::get('forgotPassword', '\App\Http\Controllers\Auth\ForgotPassword2@forgotPassword');

Route::post('forgotPassword', '\App\Http\Controllers\Auth\ForgotPassword2@sendResetPassword');

Route::get('resetPassword', '\App\Http\Controllers\Auth\ForgotPassword2@resetPassword');

Route::Post('updatePassword', '\App\Http\Controllers\Auth\ForgotPassword2@updatePassword');

Route::get('userLogin', 'App\Http\Controllers\ProfileController@userLogin');

Route::group([
    'namespace' => 'App\Http\Controllers'
], function () {
    Route::group([
        'middleware' => 'auth'
    ], function () {
        /**
         * AuthController Section
         */
        Route::get('profile', 'ProfileController@profile')->name('authProfile');
        Route::get('profile/organization', 'ProfileController@organization')->name('organization');
        Route::get('profile/organization/affiliates', 'ProfileController@listUsers')->name('memberList');

        /**
         * ProfileController Section
         */
        Route::group([
            'prefix' => 'profile'
        ], function () {
            Route::get('listUsers', 'ProfileController@listUsers')->name('profile.listUsers');
            Route::put('editName', 'ProfileController@editName')->name('profile.editName');
            Route::put('editPhone', 'ProfileController@editPhone')->name('profile.editPhone');
            Route::put('editPassword', 'ProfileController@editPassword')->name('profile.editPassword');
            Route::put('profile/organization', 'ProfileController@joinOrganization')->name('profile.joinOrganization');
            Route::put('leaveOrganization', 'ProfileController@leaveOrganization')->name('profile.leaveOrganization');
            Route::put('organization/affiliates', 'ProfileController@kickUser')->name('profile.kickUser');
        });
    });
});


