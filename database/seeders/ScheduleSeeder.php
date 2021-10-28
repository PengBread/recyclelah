<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::insert([
            [
            'scheduleID'=>'1',
            'scheduleName'=>'asgdiuag',
            'scheduleDate'=>Carbon::today()->toDateString(),
            'scheduleTimeStart'=>Carbon::now()->toTimeString(),
            'scheduleTimeEnd'=>Carbon::now()->toTimeString(),
            'scheduleStatus'=>false,
            'scheduleContent'=>'fadyfasydaid',
            'recyclingCatagory'=>'metal',
            'stateName'=>'penang',
            ],
            [
            'scheduleID'=>'2',
            'scheduleName'=>'asgdafafdafdiuag',
            'scheduleDate'=>Carbon::today()->toDateString(),
            'scheduleTimeStart'=>Carbon::now()->toTimeString(),
            'scheduleTimeEnd'=>Carbon::now()->toTimeString(),
            'scheduleStatus'=>true,
            'scheduleContent'=>'fadyfdfaffasydaid',
            'recyclingCatagory'=>'plastic',
            'stateName'=>'subang',
        
            ],
            [
            'scheduleID'=>'4',
            'scheduleName'=>'mnbvcxsdadfafa',
            'scheduleDate'=>Carbon::today()->toDateString(),
            'scheduleTimeStart'=>Carbon::now()->toTimeString(),
            'scheduleTimeEnd'=>Carbon::now()->toTimeString(),
            'scheduleStatus'=>false,
            'scheduleContent'=>'saydfsvaydvsad',
            'recyclingCatagory'=>'paper',
            'stateName'=>'kelanteh',
            ]
        ]);
    }
}
