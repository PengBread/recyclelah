<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\User;
use App\Models\UserPasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;
use App\Mail\ResetPasswordEmail;

class ForgotPassword2 extends Controller
{

    public function forgotPassword() {
        return view('auth.reset');
    }

    public function sendResetPassword(Request $request) {
        //$userEmail = User::whereEmail($request->email)->first();
        $user = User::where('email', $request->email)->first();

        if ($user == null || $user->isVerified == 0) {
            return redirect()->back()->with(['error' => 'Email does not exists']);
        }

        $user->passwordReset()->updateOrCreate(['userID' => $user->userID] , ['token' => Str::random(20), 'requested_at' => Carbon::now(), 'used_at' => null]);
        
        Mail::send(new ResetPasswordEmail($user));

        return redirect()->back()->with(['success' => 'An email for resetting your password has been sent to your email']);
    }

    public function resetPassword(Request $request) {
        $user = User::where('userID', $request->id)->first();
        $requestedAt = Carbon::parse($user->passwordReset->requested_at);

        if($user->passwordReset->token != $request->token) {
            return redirect()->route('login')->with(['error' => 'Password Reset Token Invalid']);
        }
        if($requestedAt->addMinutes(5) < Carbon::now() || $user->passwordReset->used_at) {
            return redirect()->route('login')->with(['error' => 'Expired Token']);
        }

        return view('auth.passwords.reset', ['id' => $request->id, 'token' => $request->token]);
    }

    public function updatePassword(Request $request) {
        $user = User::where('userID', $request->id)->first();
        $requestedAt = Carbon::parse($user->passwordReset->requested_at);

        if(!$user) {
            return redirect()->route('login')->with(['error' => 'User ID Invalid']);
        }
        if($user->passwordReset->token != $request->token) {
            return redirect()->route('login')->with(['error' => 'Password Reset Token Invalid']);
        }
        if($requestedAt->addMinutes(5) < Carbon::now() || $user->passwordReset->used_at) {
            return redirect()->route('login')->with(['error' => 'Expired Token']);
        }

        $userPassword = [Input::get('password')];

        $rules = array(
            'password' => 'required|string|min:8|confirmed'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user->password = Hash::make($userPassword[0]);
            $user->save();
            $user->passwordReset()->update(['used_at' => Carbon::now()]);
            return view('auth.updatePasswordSuccessful');
        }
    }
}