<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Models\Organization;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

class ProfileController extends Controller
{
    //Display User's Profile information
    public function profile(Request $request) {
        $user = auth()->user();
        return view('profile', ['userInfo' => $user]);
    }

    //Display Organization Information
    public function organization(Request $request) {
        return view('profileOrg', ['organizationInfo' => auth()->user()->affiliate]);
    }

    //Updating user account name
    public function editName(ProfileRequest $request) {
        $array = $request->safe()->only(['name']);
        auth()->user()->update($array);

        return redirect()->route('authProfile')->with(['success' => 'Successfully updated your name']);
    }

    //Updating user account phone number
    public function editPhone(ProfileRequest $request) {
        $array = $request->safe()->only(['phoneNumber']);
        auth()->user()->update($array);

        return redirect()->route('authProfile')->with(['success' => 'Successfully updated your phone number']);
    }

    //Updating user account password
    public function editPassword(ProfileRequest $request) {
        auth()->user()->update(['password' => Hash::make($request->safe()->password)]);

        return redirect()->route('authProfile')->with(['success' => 'Successfully updated your password']);
    }

    //Joining an organization
    public function joinOrganization(ProfileRequest $request) {
        //Check if code is a string and 7 maximum alphabets/numbers
        $code = $request->safe()->code;

        //Find the organization under the code
        $table = Organization::select('organizationID')
                ->where('organizationCode', '=', $code)
                ->first();
        if ($table == null) {
            return redirect()->route('organization')->withErrors([
                'invalidCodeError' => 'Invalid Code. No organization is under this code!'
            ]);
        }

        //Update user's organization affiliation column in database
        auth()->user()->update(['organizationID' => $table->organizationID]);

        return redirect()->route('organization')->with(['success' => 'Successfully joined the organization']);
    }

    //Leaving an organization
    public function leaveOrganization(Request $request) {
        auth()->user()->update(['organizationID' => null]);

        return redirect()->route('organization')->with(['success' => 'Successfully left the organization']);
    }

    //Listing all users affiliated with organization in List Workers page
    public function listUsers(Request $request) {
        //Retrieving Organization Owner's organizationID
        $organization = auth()->user()->affiliate;
        
        $page = ($request->page) ?? 1;
        $staffs = $organization
                ->staffs()
                ->where('userID', '!=', $organization->userID)     // exclude owner
                ->offset(8*($page - 1))
                ->limit(8)
                ->get();
        
        $total = $organization
                ->staffs()
                ->where('userID', '!=', $organization->userID)     // exclude owner
                ->count();
        
        return view('affiliatesList', ['userOrg' => $staffs, 'total' => $total, 'page' => $page]);
    }

    //Kicking a user from the organization
    public function kickUser(Request $request, User $kicked) {
        $kicked->update(['organizationID' => null]);
        
        return redirect()->route('memberList');
    }

    //Refreshing organization 7 digit join code
    public function refreshCode(Request $request) {
        $organization = auth()->user()->affiliate;

        Organization::where('organizationID', $organization->organizationID)
                    ->update(['organizationCode' => Str::random(7)]);

        return redirect()->route('organization');
    }
}