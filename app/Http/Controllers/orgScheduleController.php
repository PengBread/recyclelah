<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organization;
use App\Models\MapPointer;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class orgScheduleController extends Controller
{
    public function index(Request $request) {
        //display everything at the beginning
        $organization = auth()->user()->affiliate;
        $ownedBy = $organization->ownedBy;

        $page = ($request->page) ?? 1;

        //When user open the page, it will automatically check if any schedule date end is more than today's date. [Prevent schedules with date lesser than user's date to show]
        $autoStatus = Schedule::select('*')
                    ->where('organizationID', $organization->organizationID)
                    ->whereDate('scheduleDateEnd', '<=', Carbon::now('Asia/Singapore'))
                    ->update(['scheduleStatus' => false]);

        $schedules = Schedule::select('*')
                    ->where('organizationID', $organization->organizationID)
                    ->offset(8*($page - 1))
                    ->limit(8)
                    ->orderBy('scheduleStatus', 'desc')
                    ->orderBy('scheduleDateStart', 'asc')
                    ->get();

        $total = Schedule::select('*')
                ->where('organizationID', $organization->organizationID)
                ->count();

        return view('orgSchedule', ['schedules' => $schedules, 'total' => $total, 'page' => $page, 'owner' => $ownedBy]);
    }

    public function updateSchedule(Request $request) {
        $startDate = $request->scheduleDateStart;
        $hours = $request->scheduleDateEnd;

        $request->validate([
            'scheduleTitle' => 'required|string|max:50',
            'scheduleDateStart' => 'required|date',
            'scheduleDateEnd' => 'required',
            'scheduleContent'=>'required|string|max:500'
        ]);

        $target = $request->schedule;

        Schedule::where('scheduleID', $target)
                ->update(['scheduleName' => $request->scheduleTitle, 'stateName' => $request->scheduleState, 'recyclingCategory' => $request->recyclingCategory, 
                        'scheduleDateStart' => $request->scheduleDateStart, 'scheduleDateEnd' => Carbon::parse($startDate)->addHours($hours), 'scheduleContent' => $request->scheduleContent]);

        return redirect()->route('orgSchedule.schedules');

    }

    public function deleteSchedule(Request $request) {
        $target = $request->schedule;
        
        $schedule = Schedule::where('scheduleID', $target)
                    ->delete();
        
        return redirect()->route('orgSchedule.schedules');
    }

    public function createSchedule(Request $request) {
        $startDate = $request->scheduleDateStart;
        $hours = $request->scheduleDateEnd;
        $request->validate([
            'scheduleTitle' => 'required|string|max:50',
            'scheduleDateStart' => 'required|date',
            'scheduleDateEnd' => 'required',
            'scheduleContent'=>'required|string|max:500'
        ]);
        
        $organization = auth()->user()->affiliate;
        Schedule::create([
            'organizationID' => $organization->organizationID,
            'scheduleName' => $request->input('scheduleTitle'),
            // 'scheduleName' => $request->input('scheduleTitle'),
            'stateName' => $request->scheduleState,
            'scheduleDateStart' => $request->input('scheduleDateStart'),
            'scheduleDateEnd' => Carbon::parse($startDate)->addHours($hours),
            'scheduleContent' => $request->input('scheduleContent'),
            'recyclingCategory'=> $request->scheduleCategory,
            'scheduleStatus' => true,
        ]);
        return redirect()->route('orgSchedule.schedules')->with('success', 'Successfully create a new Schedule.');
    }
}