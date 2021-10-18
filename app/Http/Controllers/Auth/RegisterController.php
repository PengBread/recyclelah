<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreateValidationRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'phoneNumber' => ['required', 'regex:/(6?01)[0-9]{8,9}/', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'organizationName' => ['string', 'max:50']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phoneNumber' => $data['phoneNumber'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
        // if ($request->flexRadioDefault == 'organization') {
        //     return Validator::make($data, [
        //         'organizationName' => ['required', 'string', 'max:50'],
        //     ]);
            // $organization = new Organization();
            // $random = Str::random(40);
            // $organization->organizationName = $data['organizationName'];
            // $organization->organizationCode = $random;
            // $organization->save();

        //$organization = Client->findOrFail($id);
        // if ($data['organizationName']) {
        //     $random = Str::random(5);
        //     return Organization::create([
        //         'organizationName' => $data['organizationName'],
        //         'organizationCode' => $random,
        //     ]);
        // }
