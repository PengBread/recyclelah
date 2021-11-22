<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

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
    return view('home');
});

Route::get('/verify', function () {
    return view('auth.verify');
});

Route::get('/reset', function () {
    return view('auth.reset');
});

//pull out from group for testing
Route::get('support', 'App\Http\Controllers\SupportController@getInfo')->name('support');
Route::post('send', 'App\Http\Controllers\SupportController@sendMail')->name('support.sendMail');
Route::get('mailSuccess', 'App\Http\Controllers\SupportController@mailSuccess');

Route::group([
    'namespace' => 'App\Http\Controllers\Auth'
], function() {

    Route::get('/login', function () {return view('auth.login');})->name('login')->middleware('guest');
    Route::post('login', 'LoginController@authentication')->middleware('guest');
    Route::get('logout', 'LogoutController@logout');

    Route::get('register', 'RegisterController@index')->middleware('guest');
    Route::post('register', 'RegisterController@register')->middleware('guest');
    Route::get('verified', 'RegisterController@verified')->name('verification');
    Route::post('resendEmail', 'RegisterController@sendEmail');

    Route::get('forgotPassword', 'ForgotPasswordController@forgotPassword')->middleware('guest');
    Route::post('forgotPassword', 'ForgotPasswordController@sendResetPassword')->middleware('guest');
    Route::get('resetPassword', 'ForgotPasswordController@resetPassword')->name('resetPassword')->middleware('guest');
    Route::post('updatePassword', 'ForgotPasswordController@updatePassword')->middleware('guest');
});

Route::group([
    'namespace' => 'App\Http\Controllers'
], function () {
    Route::group([
        //none
    ], function () {
        /**
         * Without Login Checking. Available to everyone
         */
        Route::get('schedules', 'ScheduleController@index')->name('schedules');
        // Route::post('schedules', 'ScheduleController@display')->name('display');
        Route::get('faq', function () { return view('faq'); })->name('faq');
        Route::get('rankings', 'RankingsController@displayRankings')->name('rankings');
        // Route::get('support', 'SupportController@getInfo')->name('support');
    });
    Route::group([
        'middleware' => ['auth', 'verifyCheck']
    ], function () {
        /**
         * AuthController Section - Put route here if you want the don't want non-account users to open the page.
         */
        Route::get('profile', 'ProfileController@profile')->name('authProfile');
        Route::get('profile/organization', 'ProfileController@organization')->name('organization');
        Route::get('profile/organization/affiliates', 'ProfileController@listUsers')->name('memberList');
        Route::get('map', 'MapController@mapPage')->name('mapPage');
        Route::get('organizationMap', 'MapController@workerPage')->name('workerPage');
        Route::get('/email/verify', function () {
            if(auth()->user()->isVerified) {
                return redirect('/');
            }
            return view('auth.verify');
        });

        /**
         * ScheduleController Section
         */
        Route::group([
            'prefix' => 'schedule'
        ], function () {
            Route::put('/join', 'ScheduleController@joinSchedule')->name('schedule.joinSchedule');
            Route::put('/leave', 'ScheduleController@leaveSchedule')->name('schedule.leaveSchedule');
        });

        /**
         * MapController Section
         */
        Route::group([
            'prefix' => 'map'
        ], function () {
            Route::put('add', 'MapController@addLocation')->name('map.addLocation');
            Route::put('status', 'MapController@changeStatus')->name('map.changeStatus');
            Route::put('userConfirmation', 'MapController@userConfirm')->name('map.userConfirm');
            Route::put('alert', 'MapController@alertUser')->name('map.alertUser');
            Route::put('alertDone', 'MapController@alertOk')->name('map.alertOk');
            // Route::put('list', 'MapController@listLocation')->name('map.listLocation');
        });

        /**
         * ProfileController Section
         */
        Route::group([
            'prefix' => 'profile'
        ], function () {
            Route::put('editName', 'ProfileController@editName')->name('profile.editName');
            Route::put('editPhone', 'ProfileController@editPhone')->name('profile.editPhone');
            Route::put('editPassword', 'ProfileController@editPassword')->name('profile.editPassword');
            Route::get('listUsers', 'ProfileController@listUsers')->name('profile.listUsers');
            Route::put('profile/organization', 'ProfileController@joinOrganization')->name('profile.joinOrganization');
            Route::put('leaveOrganization', 'ProfileController@leaveOrganization')->name('profile.leaveOrganization');
            Route::put('organization/affiliates/{kicked}', 'ProfileController@kickUser')->name('profile.kickUser');
            Route::get('refreshCode', 'ProfileController@refreshCode')->name('profile.refreshCode');
        });

        /**
         * Organization ScheduleController Section
         */
        Route::group([
            'prefix' => 'orgSchedule'
        ], function () {
            Route::get('schedules', 'orgScheduleController@index')->name('orgSchedule.schedules');
            // Route::post('schedules', 'orgScheduleController@display')->name('orgSchedule.filter');
            Route::put('update', 'orgScheduleController@updateSchedule')->name('orgSchedule.updateSchedule');
            Route::put('delete', 'orgScheduleController@deleteSchedule')->name('orgSchedule.deleteSchedule');
            Route::post('createSchedule', 'orgScheduleController@createSchedule')->name('orgSchedule.createSchedule');
        });

        /**
         * Support Section
         */
        Route::group([
            'prefix' => 'support'
        ], function () {
            /// Route::post('send', 'SupportController@sendMail')->name('support.sendMail');
        });
    });
});

//Route::post('/profile/organization', 'ProfileController@createSchedule');

//Route::get('/profile/organization', [ProfileController::class, 'createSchedule']);