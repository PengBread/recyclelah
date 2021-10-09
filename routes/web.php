<?php

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
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


Route::get('/reset', function (Request $request) {
    return view('reset');
});

Route::get('/verify', function (Request $request) {
    return view('verify');
});

Route::get('/login', function (Request $request) {
    return view('login');
});

Route::get('/register', function (Request $request) {
    return view('register');
});


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/schedule', function () {
//     return view('schedule');
// });

// Route::get('/map', function () {
//     return view('map');
// });

// Route::get('/support', function () {
//     return view('support');
// });

// Route::get('/faq', function () {
//     return view('faq');
// });

// Route::get('/profile', function () {
//     return view('profile');
// });
