<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use App\Models\MapPointer;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function mapPage(Request $request) {
        if(!auth()->user()->pointer) {
            return view('map');
        } else {
            // if(auth()->user()->affiliate) {
            //     //worker
            //     $user = auth()->user()->pointer;
            //     $organization = auth()->user()->affiliate;
            //     $schedules = $organization
            //                 -> schedules;

            //     return view('map', ['userInfo' => $user, 'schedules' => $schedules]);
            // } else {
                //non worker
                $user = auth()->user()->pointer;

                return view('map', ['userInfo' => $user]);
            // }
        }
    }

    //User set their marker/pointer location
    public function addLocation(Request $request) {
        //save location
        if(!auth()->user()->pointer) {
            $create =
            MapPointer::create([
                'longitude' => $request->lng,
                'latitude' => $request->lat,
                'pointerAddress' => $request->placeInfo,
                'pointerStatus' => 'Active',
                'recycleCategory' => 'Paper',
            ]);
        } else {
            auth()->user()->pointer->update(['pointerAddress' => $request->placeInfo, 'longitude' => $request->lng, "latitude" => $request->lat], ['recycleCategory' => 'Paper']);
        }

        return redirect()->route('mapPage');
    }

    public function workerPage(Request $request) {
        if(!auth()->user()->affiliate) {
            return redirect()->route('mapPage');
        } else {
            //worker
            $organization = auth()->user()->affiliate;
            $selectedDate = $request->input('dateSchedules');
            // dd($selectedDate);
            $scheduleFilter = $organization
                            -> schedules;

            $schedules = $organization
                        -> schedules()
                        -> where('scheduleID', '=', $selectedDate)
                        -> get();

            $pointers = MapPointer::whereIn('scheduleID', $schedules->pluck('scheduleID'))
                        -> get();
            

            return view('workerMap', ['schedules' => $scheduleFilter ,'pointers' => $pointers]);
        }
    }

    // public function listLocation(Request $request) {
    //     //load all location
    //     $organization = auth()->user()->affiliate;
    //     $selectedDate = $request->input('dateSchedules');
    //     $schedules = $organization
    //                 -> schedules()
    //                 -> where('scheduleID', '=', $selectedDate)
    //                 -> get();

    //     $pointers = MapPointer::select('pointerID')
    //                 -> where('scheduleID', '=', $schedules->pluck('scheduleID'))
    //                 -> get();

    //     //get user organizationID
    //     //Use organizationID to find all schedules
    //     //Get all schedules available, use $request input the find the selected schedule on the date.
    //     //Get all pointers, then find all pointers under the specific schedule with scheduleID

    //     return view('workerMap', ['userPointers' => $pointers]);
    // }
}
