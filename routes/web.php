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

Route::get('/test', function () {
    return view('test');
});

Route::get('/verify', function () {
    return view('auth.verify');
});

Route::get('/reset', function () {
    return view('auth.reset');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', '\App\Http\Controllers\Auth\LoginController2@authentication');

//Auth::routes(['verify' => true]);

Route::get('logout', '\App\Http\Controllers\Auth\LogoutController@logout');

Route::resource('/register', registerController2::class);

Route::get('/email/verify', function () {
    return view('auth.verify');
});

Route::get('forgotPassword', '\App\Http\Controllers\Auth\ForgotPassword2@forgotPassword');

Route::post('forgotPassword', '\App\Http\Controllers\Auth\ForgotPassword2@sendResetPassword');

Route::get('resetPassword', '\App\Http\Controllers\Auth\ForgotPassword2@resetPassword');

Route::Post('updatePassword', '\App\Http\Controllers\Auth\ForgotPassword2@updatePassword');

Route::get('userLogin', 'App\Http\Controllers\Auth\LoginController2@userLogin');

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
        Route::post('schedules', 'ScheduleController@display')->name('display');
        Route::get('faq', function () { return view('faq'); })->name('faq');
        Route::get('support', function () { return view('support'); })->name('support');
    });
    Route::group([
        'middleware' => 'auth'
    ], function () {
        /**
         * AuthController Section - Put route here if you want the don't want non-account users to open the page.
         */
        Route::get('profile', 'ProfileController@profile')->name('authProfile');
        Route::get('profile/organization', 'ProfileController@organization')->name('organization');
        Route::get('profile/organization/affiliates', 'ProfileController@listUsers')->name('memberList');
        Route::get('map', 'MapController@mapPage')->name('mapPage');
        Route::get('organizationMap', 'MapController@workerPage')->name('workerPage');

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
        });

        /**
         * ScheduleController Section
         */
        Route::group([
            'prefix' => 'schedule'
        ], function () {
            Route::put('/join', 'ScheduleController@joinSchedule')->name('schedule.joinSchedule');
        });

        /**
         * MapController Section
         */
        Route::group([
            'prefix' => 'map'
        ], function () {
            Route::put('add', 'MapController@addLocation')->name('map.addLocation');
            // Route::put('list', 'MapController@listLocation')->name('map.listLocation');
        });
    });
});


