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
                'organizationID' => '1',
                'scheduleName' => 'asgdiuag',
                'scheduleDate' => Carbon::today()->toDateString(),
                'scheduleTimeStart' => Carbon::now()->toTimeString(),
                'scheduleTimeEnd' => Carbon::now()->toTimeString(),
                'scheduleStatus' => false,
                'scheduleContent' => 'fadyfasydaid',
                'recyclingCatagory' => 'Metal',
                'stateName' => 'Penang',
            ],
            [
                'organizationID' => '1',
                'scheduleName' => 'asgdafafdafdiuag',
                'scheduleDate' => Carbon::today()->toDateString(),
                'scheduleTimeStart' => Carbon::now()->toTimeString(),
                'scheduleTimeEnd' => Carbon::now()->toTimeString(),
                'scheduleStatus' => true,
                'scheduleContent' => 'fadyfdfaffasyid',
                'recyclingCatagory' => 'Plastic',
                'stateName' => 'Selangor',
            ],
            [
                'organizationID' => '1',
                'scheduleName' => 'mnbvcxsdadfafa',
                'scheduleDate' => Carbon::today()->toDateString(),
                'scheduleTimeStart' => Carbon::now()->toTimeString(),
                'scheduleTimeEnd' => Carbon::now()->toTimeString(),
                'scheduleStatus' => false,
                'scheduleContent' => 'saydfsvaydvsad',
                'recyclingCatagory' => 'Paper',
                'stateName' => 'Kelantan',
            ],
        ]);
    }
}
