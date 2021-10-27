<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User as Model;

class ProfileController extends Controller
{

    public function userLogin(Request $request)
    {
        Auth::login(Model::all()->last());
        return Redirect("http://127.0.0.1:8000/profile");
    }

    public function profile(Request $request)
    {
        //Auth::login(Model::all()->last());
        $user = auth()->user();
        return view('profile', ['userInfo' => $user]);
    }

    public function organization(Request $request)
    {

        if (auth()->user()->affiliate != null) {
            $organization = auth()->user()->affiliate;

            return view('profileOrg', ['userInfo' => $organization]);
        } else {
            return view('profileOrg');
        }
    }

    public function editName(ProfileRequest $request)
    {
        $array = $request->safe()->only(['name']);
        auth()->user()->update($array);

        return redirect()->route('authProfile');
    }

    public function editPhone(ProfileRequest $request)
    {
        $array = $request->safe()->only(['phoneNumber']);
        auth()->user()->update($array);

        return redirect()->route('authProfile');
    }

    public function editPassword(ProfileRequest $request)
    {
        // auth()->user()->password = Hash::make($request->safe()->password);
        auth()->user()->update(['password' => Hash::make($request->safe()->password)]);

        return redirect()->route('authProfile');
    }

    public function joinOrganization(ProfileRequest $request)
    {
        $code = $request->safe()->code;

        $table = Organization::select('organizationID')
            ->where('organizationCode', '=', $code)
            ->first();
        if ($table == null) {
            return redirect()->route('organization')->withErrors([
                'invalidCodeError' => 'Invalid Code. No organization is under this code!'
            ]);
        }

        auth()->user()->update(['organizationID' => $table->organizationID]);

        return redirect()->route('organization');

        // $table = DB::table('organizations')
        //                     ->select('organizationID')
        //                     ->where('organizationCode', '=', $code)
        //                     ->get();
    }

    public function leaveOrganization(Request $request)
    {
        auth()->user()->update(['organizationID' => null]);

        return redirect()->route('authProfile');
    }

    public function listUsers(Request $request)
    {
        $orgID = auth()->user()->organizationID;
        $user = User::select('name', 'phoneNumber')
            ->where('organizationID', '=', $orgID)
            ->get();

        return view('affiliatesList', ['usersOrg' => $user]);
    }

    public function kickUser(Request $request)
    {

        return view('affiliatesList');
    }

    public function createSchedule(Request $request)
    {
        //
    }
}
