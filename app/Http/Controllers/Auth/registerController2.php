<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User as Model;
use App\Models\Organization;
use Illuminate\Support\Str;
use Mail;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ActivationMail;

class registerController2 extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //if user choose household/worker radio button
        if ($request->flexRadioDefault == 'household_worker') {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'phoneNumber' => 'required|regex:/(6?01)[0-9]{8,10}/|unique:users',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-zA-Z]/',
                    'regex:/[0-9]/',
                ],
                'password-confirm' => 'required|same:password'
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'password' => Hash::make($request->input('password')),
            ]);
        }
        //if user choose organization radio button 
        else {
            $request->validate([
                'organizationName' => 'required|string|max:50',
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users',
                'phoneNumber' => 'required|regex:/(6?01)[0-9]{8,9}/|unique:users',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/[a-zA-Z]/',
                    'regex:/[0-9]/',
                ],
                'password-confirm' => 'required|same:password'
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'password' => Hash::make($request->input('password')),
            ]);
            $organization = Organization::create([
                'userID' => $user->userID,
                'organizationName' => $request->input('organizationName'),
                'organizationCode' => Str::random(5)
            ]);

            $user->organizationID = $organization->organizationID;
            $user->save();
        }

        $body = [
            'name' => $request->input('name'),
            'url' => 'http://127.0.0.1:8000/verified',
        ];

        Mail::to($request->input('email'))
            ->send(new ActivationMail($body));

        return redirect('/email/verify');
    }

    public function verified() {
        $user = Model::all()->last();
        $user->isVerified = 1;
        $user->save();
        Auth::login($user);
        return redirect("/profile");
    }

    public function sendEmail(){
        $user = Model::all()->last();
        $body = [
            'name' => $user->name,
            'url' => 'http://127.0.0.1:8000/verified',
        ];

        Mail::to($user->email)
            ->send(new ActivationMail($body));
        return redirect()->back()->with(['email' => 'Email sent successfully']);
    }
}