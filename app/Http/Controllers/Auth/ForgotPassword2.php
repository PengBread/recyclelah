<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;
use App\Mail\ResetPasswordEmail;

class ForgotPassword2 extends Controller
{

    public function forgotPassword()
    {
        return view('auth.reset');
    }

    public function sendResetPassword(Request $request)
    {
        //$userEmail = User::whereEmail($request->email)->first();
        $user = User::where('email', $request->email)->first();

        if ($user == null || $user->isVerified == 0) {
            return redirect()->back()->with(['error' => 'Email does not exists']);
        }

        // $body = [
        //     'name' => $user->name,
        //     'url' => route('verification', ['id' => $this->user->userID]),
        // ];

        Mail::send(new ResetPasswordEmail($user));

        return redirect()->back()->with(['success' => 'An email for resetting your password has been sent to your email']);
    }

    public function resetPassword()
    {
        return view('auth.passwords.reset');
    }

    public function updatePassword(Request $request)
    {

        $user = User::whereEmail($request->email)->first();

        if (($user) == null) {
            return redirect()->back()->withErrors(['email' => 'Email not exists']);
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
            return view('auth.updatePasswordSuccessful');
        }
    }
}