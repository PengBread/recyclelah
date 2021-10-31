<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use App\Models\Organization;
//use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index(Request $request)
    {
        //display everything at the beginning
        $catagory = Schedule::select('recyclingCatagory')->groupBy('recyclingCatagory')->get();

        $organizationName = Organization::join('schedules', 'schedules.organizationID', '=', 'organizations.organizationID')
            ->orderBy('organizations.organizationName')
            ->groupBy('organizations.organizationName')
            ->get('organizations.organizationName');

        $schedules = Schedule::all()->toJson();

        $schedules = json_decode($schedules);

        return view('schedule', [
            'catagory' => $catagory,
            'organization' => $organizationName,
            'schedules' => $schedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function display()
    {
        $catagory = Schedule::select('recyclingCatagory')->groupBy('recyclingCatagory')->get();

        $organizationName = Organization::join('schedules', 'schedules.organizationID', '=', 'organizations.organizationID')
            ->orderBy('organizations.organizationName')
            ->groupBy('organizations.organizationName')
            ->get('organizations.organizationName');

        $catSelection = Request::get('catScheduleSelection');
        $stateSelection = Request::get('stateScheduleSelection');
        $orgSelection = Request::get('orgScheduleSelection');
        $dateSelection = Request::get('dateScheduleSelection');

        //fucking stupid method to get the value, use a smarter one if anyone could think of it
        //if catagory is selected
        if ($catSelection != 'Select a Catagory' && $stateSelection == 'Select a State' && $orgSelection == 'Select an Organization' && $dateSelection == null) {

            $schedules = DB::table('schedules')
                ->where('recyclingCatagory', '=', $catSelection)
                ->get();
        }

        //if state is selected
        else if ($catSelection == 'Select a Catagory' && $stateSelection != 'Select a State' &&  $orgSelection == 'Select an Organization' && $dateSelection == null) {

            $schedules = DB::table('schedules')
                ->where('stateName', '=', $stateSelection)
                ->get();
        }

        //if organization is selected
        else if ($catSelection == 'Select a Catagory' && $stateSelection == 'Select a State' && $orgSelection != 'Select an Organization' && $dateSelection == null) {

            $organizationID = Schedule::join('organizations', 'schedules.organizationID', '=', 'organizations.organizationID')
                ->where('organizations.organizationName', '=', $orgSelection)
                ->groupBy('schedules.organizationID')
                ->pluck('schedules.organizationID');

            $schedules = DB::table('schedules')
                ->where('organizationID', '=', $organizationID)
                ->get();
        }

        //if date is selected
        else if ($catSelection == 'Select a Catagory' && $stateSelection == 'Select a State' && $orgSelection == 'Select an Organization' && $dateSelection != null) {

            $schedules = DB::table('schedules')
                ->where('scheduleDate', '=', $dateSelection)
                ->get();
        }

        //if catagory and state is selected
        else if ($catSelection != 'Select a Catagory' && $stateSelection != 'Select a State' && $orgSelection == 'Select an Organization' && $dateSelection == null) {

            $schedules = DB::table('schedules')
                ->where('recyclingCatagory', '=', $catSelection)
                ->where('stateName', '=', $stateSelection)
                ->get();
        }

        //if catagory and organization is selected
        else if ($catSelection != 'Select a Catagory' && $stateSelection == 'Select a State' && $orgSelection != 'Select an Organization' && $dateSelection == null) {

            $organizationID = Schedule::join('organizations', 'schedules.organizationID', '=', 'organizations.organizationID')
                ->where('organizations.organizationName', '=', $orgSelection)
                ->groupBy('schedules.organizationID')
                ->pluck('schedules.organizationID');

            $schedules = DB::table('schedules')
                ->where('recyclingCatagory', '=', $catSelection)
                ->where('organizationID', '=', $organizationID)
                ->get();
        }

        //if catagory and date is selected
        else if ($catSelection != 'Select a Catagory' && $stateSelection == 'Select a State' && $orgSelection == 'Select an Organization' && $dateSelection != null) {

            $schedules = DB::table('schedules')
                ->where('recyclingCatagory', '=', $catSelection)
                ->where('scheduleDate', '=', $dateSelection)
                ->get();
        }

        //if state and organization is selected
        else if ($catSelection == 'Select a Catagory' && $stateSelection != 'Select a State' && $orgSelection != 'Select a Organization' && $dateSelection == null) {

            $organizationID = Schedule::join('organizations', 'schedules.organizationID', '=', 'organizations.organizationID')
                ->where('organizations.organizationName', '=', $orgSelection)
                ->groupBy('schedules.organizationID')
                ->pluck('schedules.organizationID');

            $schedules = DB::table("schedules")
                ->where('stateName', '=', $stateSelection)
                ->where('organizationID', '=', $organizationID)
                ->get();
        }

        //if state and date is selected
        else if ($catSelection == 'Select a Catagory' && $stateSelection != 'Select a State' && $orgSelection == 'Select a Organization' && $dateSelection != null) {

            $schedules = DB::table("schedules")
                ->where('stateName', '=', $stateSelection)
                ->where('scheduleDate', '=', $dateSelection)
                ->get();
        }

        //if organization and date is selected
        else if ($catSelection == 'Select a Catagory' && $stateSelection == 'Select a State' && $orgSelection != 'Select a Organization' && $dateSelection != null) {

            $organizationID = Schedule::join('organizations', 'schedules.organizationID', '=', 'organizations.organizationID')
                ->where('organizations.organizationName', '=', $orgSelection)
                ->groupBy('schedules.organizationID')
                ->pluck('schedules.organizationID');

            $schedules = DB::table("schedules")
                ->where('organizationID', '=', $organizationID)
                ->where('scheduleDate', '=', $dateSelection)
                ->get();
        }

        //if catagory, state and organization is selected
        else if ($catSelection != 'Select a Catagory' && $stateSelection != 'Select a State' && $orgSelection != 'Select a Organization' && $dateSelection == null) {

            $organizationID = Schedule::join('organizations', 'schedules.organizationID', '=', 'organizations.organizationID')
                ->where('organizations.organizationName', '=', $orgSelection)
                ->groupBy('schedules.organizationID')
                ->pluck('schedules.organizationID');

            $schedules = DB::table("schedules")
                ->where('recyclingCatagory', '=', $catSelection)
                ->where('stateName', '=', $stateSelection)
                ->where('organizationID', '=', $organizationID)
                ->get();
        }

        //if catagory, state and date is selected
        else if ($catSelection != 'Select a Catagory' && $stateSelection != 'Select a State' && $orgSelection == 'Select a Organization' && $dateSelection != null) {

            $schedules = DB::table("schedules")
                ->where('recyclingCatagory', '=', $catSelection)
                ->where('stateName', '=', $stateSelection)
                ->where('scheduleDate', '=', $dateSelection)
                ->get();
        }

        //if catagory, organization and date is selected
        else if ($catSelection != 'Select a Catagory' && $stateSelection == 'Select a State' && $orgSelection != 'Select a Organization' && $dateSelection != null) {

            $organizationID = Schedule::join('organizations', 'schedules.organizationID', '=', 'organizations.organizationID')
                ->where('organizations.organizationName', '=', $orgSelection)
                ->groupBy('schedules.organizationID')
                ->pluck('schedules.organizationID');

            $schedules = DB::table("schedules")
                ->where('recyclingCatagory', '=', $catSelection)
                ->where('organizationID', '=', $organizationID)
                ->where('scheduleDate', '=', $dateSelection)
                ->get();
        }

        //if state, organization and date is selected
        else if ($catSelection == 'Select a Catagory' && $stateSelection != 'Select a State' && $orgSelection != 'Select a Organization' && $dateSelection != null) {

            $organizationID = Schedule::join('organizations', 'schedules.organizationID', '=', 'organizations.organizationID')
                ->where('organizations.organizationName', '=', $orgSelection)
                ->groupBy('schedules.organizationID')
                ->pluck('schedules.organizationID');

            $schedules = DB::table("schedules")
                ->where('stateName', '=', $stateSelection)
                ->where('organizationID', '=', $organizationID)
                ->where('scheduleDate', '=', $dateSelection)
                ->get();
        }

        //if catagory, state, organization and date is selected
        else if ($catSelection != 'Select a Catagory' && $stateSelection != 'Select a State' && $orgSelection != 'Select a Organization' && $dateSelection != null) {

            $organizationID = Schedule::join('organizations', 'schedules.organizationID', '=', 'organizations.organizationID')
                ->where('organizations.organizationName', '=', $orgSelection)
                ->groupBy('schedules.organizationID')
                ->pluck('schedules.organizationID');

            $schedules = DB::table("schedules")
                ->where('recyclingCatagory', '=', $catSelection)
                ->where('stateName', '=', $stateSelection)
                ->where('organizationID', '=', $organizationID)
                ->where('scheduleDate', '=', $dateSelection)
                ->get();
        }

        //if none is selected
        else {
            $schedules = Schedule::all()->toJson();
            $schedules = json_decode($schedules);
        }

        return view('schedule', [
            'catagory' => $catagory,
            'organization' => $organizationName,
            'schedules' => $schedules,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCatagory($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
