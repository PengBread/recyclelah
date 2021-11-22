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

class ForgotPasswordController extends Controller
{
    //Prompt user to forgotPassword page
    public function forgotPasswordPage() {
        return view('auth.forgotPassword');
    }

    //Send reset Password Email
    public function sendResetPassword(Request $request) {
        $user = User::where('email', $request->email)->first();

        if ($user == null || $user->isVerified == 0) {
            return redirect()->back()->with(['error' => 'Email does not exists']);
        }

        $user->passwordReset()->updateOrCreate(['userID' => $user->userID] , ['token' => Str::random(20), 'requested_at' => Carbon::now(), 'used_at' => null]);
        
        Mail::send(new ResetPasswordEmail($user));
        return redirect()->back()->with(['success' => 'An email for resetting your password has been sent to your email']);
    }

    //Prompt user to reset password page with validation.
    public function resetPasswordPage(Request $request) {
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

    //Change user's password according to reset password request
    public function updatePassword(Request $request) {
        $user = User::where('userID', $request->id)->first();
        $requestedAt = Carbon::parse($user->passwordReset->requested_at);

        //Check if user id is valid
        if(!$user) {
            return redirect()->route('login')->with(['error' => 'User ID Invalid']);
        }
        //Check if user token and link token is correct or not
        if($user->passwordReset->token != $request->token) {
            return redirect()->route('login')->with(['error' => 'Password Reset Token Invalid']);
        }
        //Check if token is more than 5 minutes, more than 5 minutes is expired.
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