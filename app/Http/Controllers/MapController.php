<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use App\Models\MapPointer;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Mail\RecycleableEmail;
use Mail;

class MapController extends Controller
{
    public function mapPage(Request $request) {
        if(!auth()->user()->pointer) {
            //For the sake of prevent error on javascript.
            return view('map', ['userInfo' => $request]);
        } else {
            $user = auth()->user()->pointer;
            
            return view('map', ['userInfo' => $user]);
        }
    }

    //User set their marker/pointer location
    public function addLocation(Request $request) {
        //save location
        if(!auth()->user()->pointer) {
            //Create new pointer column
            $create =
            MapPointer::create([
                'longitude' => $request->lng,
                'latitude' => $request->lat,
                'pointerAddress' => $request->placeInfo,
                'pointerStatus' => 'Active',
                'recycleCategory' => $request->category,
            ]);
            //Insert pointerID into User
            auth()->user()->update(['pointerID' => $create->pointerID]);
        } else {
            auth()->user()->pointer->update(['pointerAddress' => $request->placeInfo, 'longitude' => $request->lng, "latitude" => $request->lat, 'recycleCategory' => $request->category]);
        }

        return redirect()->route('mapPage')->with('success', 'Successfully added your location');
    }

    public function workerPage(Request $request) {
        if(!auth()->user()->affiliate) {
            return redirect()->route('mapPage');
        } else {
            //Check which organization user is affiliate to
            $organization = auth()->user()->affiliate;

            //Find schedules under this organization
            $scheduleFilter = $organization->schedules();

            //Check the input of the drop down list
            $selectedDate = $request->input('dateSchedules');

            if($selectedDate != null) {
                //If user selected Show All User Location, this will execute
                if($selectedDate == 'showAll') {
                    return redirect()->route('workerPage');
                }
                
                $scheduleFilter->where('scheduleID', $selectedDate);
            }

            $schedules = $scheduleFilter->get();

            $pointers = MapPointer::whereIn('scheduleID', $schedules->pluck('scheduleID'))
                        -> get();

            $userID = User::join('map_pointers', 'map_pointers.pointerID', '=', 'users.pointerID')
                        -> join('schedules', 'schedules.scheduleID', '=', 'map_pointers.scheduleID')
                        -> whereIn('map_pointers.pointerID', $pointers->pluck('pointerID'))
                        -> get();
            
            return view('workerMap', ['schedules' => $schedules ,'pointers' => $userID, 'filter' => $organization->schedules]);
        }
    }

    public function changeStatus(Request $request) {
        $pointer = $request->input('pointer_Input');
        $target = MapPointer::where('pointerID', $pointer)->first();

        $collectedBtn = $request->collectedBtn;
        

        if($collectedBtn == "collected") {
            $target->update(['pointerStatus' => 'Done', 'arrived_At' => Carbon::now('Asia/Singapore')]);

            $title = 'Recycle Lah - Recycle Truck Confirmation';

            Mail::send(new RecycleableEmail($target->createdBy, $title, 'The recycling truck has marked your pointer as completed. Please confirm by clicking a button below the map in the "Map" page.'));

        } else {
            $target->update(['pointerStatus' => 'Active', 'arrived_At' => null]);

            $title = 'Recycle Lah - Recycle Truck Confirmation - Mistake';

            Mail::send(new RecycleableEmail($target->createdBy, $title, 'The recycling truck has unset the confirmation. We apologize for any inconvenience.'));
        }

        return redirect()->route('workerPage');
    }

    //Alerting user when worker alert them
    public function alertUser(Request $request) {
        $pointer = $request->input('pointer_Input');
        $organization = auth()->user()->affiliate;
        
        $target = MapPointer::where('pointerID', $pointer)->first();
        $target->pointerStatus = 'Alert';
        $target->save();

        Mail::send(new RecycleableEmail($target->createdBy, 'Recycle Lah - Recycle Truck Alert', 'A recycling truck is heading towards your house now.'));

        return redirect()->route('workerPage');
    }

    //User Confirmation When Worker Set their Pointer Collected
    public function userConfirm(Request $request) {
        auth()->user()->pointer->update(['pointerStatus' => 'Active', 'scheduleID' => null,'confirmed_At' => Carbon::now()]);

        auth()->user()->increment('points', 1);

        return redirect()->route('mapPage');
    }

    public function alertOk(Request $request) {
        auth()->user()->pointer->update(['pointerStatus' => 'Active']);

        return redirect()->route('mapPage');
    }
}