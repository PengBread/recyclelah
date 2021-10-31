<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function getSchedules(){
        $schedules= DB::select('SELECT scheduleName, stateName, scheduleDate, scheduleTimeStart, scheduleContent, recyclingCatagory FROM schedules');
        
        $catagory=DB::select('SELECT DISTINCT recyclingCatagory FROM schedules');
        $state=DB::select('SELECT DISTINCT stateName FROM schedules ORDER BY stateName ASC');
        $date=DB::select('SELECT DISTINCT scheduleDate FROM schedules ORDER BY scheduleDate DESC');

        return view('schedule', ['schedules'=>$schedules, 
                                 'catagory'=>$catagory, 
                                 'state'=>$state, 
                                 'date'=>$date
                                ]);
    }

    // public function fillCatagory(){
    //     $catagory=DB::select('SELECT recyclingCatagory FROM schedules');
    //     return view('schedule',['catagory'=>$catagory]);
    // }

    // public function fillState(){
    //     $state=DB::select('SELECT stateName FROM schedules');
    //     return view('schedule',['state'=>$state]);
    // }

    // public function fillDate(){
    //     $date=DB::select('SELECT scheduleDate FROM schedules');
    //     return view('schedule',['date'=>$date]);
    // }

    

    // public function scheduleChosen(){
    //     $schedules2= DB::select('SELECT scheduleName, scheduleContent FROM schedules');
        
    //     return view('schedule', ['schedules'=>$schedules2]);
    
    // }

    // public function scheduleFilters(Request $request){
    //     $name=DB::table('schedules')->select('scheduleName')->distinct()->get()->pluck('scheduleName')->sort();
    //     $state=DB::table('schedules')->select('stateName')->distinct()->get()->pluck('stateName');
    //     $date=DB::table('schedules')->select('scheduleDate')->distinct()->get()->pluck('scheduleDate');
    //     $time=DB::table('schedules')->select('scheduleTimeStart')->distinct()->get()->pluck('scheduleTimeStart');


    //     return view('schedule', [
    //         'scheduleName'=>$name,
    //         'stateName'=>$state,
    //         'scheduleDate'=>$date,
    //         'scheduleTimeStart'=>$time
    //         // one more hting here
    //     ]);
    // }

}
