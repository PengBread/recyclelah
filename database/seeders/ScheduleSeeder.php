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
                'scheduleName'=> 'testOrg',
                'scheduleDateStart'=>Carbon::now(),
                'scheduleDateEnd'=>Carbon::now()->addHours(5),
                'scheduleStatus'=> false,
                'scheduleContent'=>'Schedule Time: 2PM - 6PM',
                'recyclingCategory'=>'Paper',
                'stateName'=>'Penang',
            ],
            [
                'organizationID' => '1',
                'scheduleName'=> 'testOrg',
                'scheduleDateStart'=>Carbon::now(),
                'scheduleDateEnd'=>Carbon::now()->addHours(2),
                'scheduleStatus'=> true,
                'scheduleContent'=> 'Schedule Time: 1PM - 4PM',
                'recyclingCategory'=> 'Plastic',
                'stateName'=> 'Selangor',
        
            ],
            [
                'organizationID' => '1',
                'scheduleName'=>'testOrg',
                'scheduleDateStart'=>Carbon::now(),
                'scheduleDateEnd'=>Carbon::now()->addHours(4),
                'scheduleStatus'=> false,
                'scheduleContent'=> 'Schedule Time: 2PM - 6PM',
                'recyclingCategory'=> 'Metal',
                'stateName'=> 'Kelantan',
            ],
            [
                'organizationID' => '1',
                'scheduleName'=>'testOrg',
                'scheduleDateStart'=>Carbon::now(),
                'scheduleDateEnd'=>Carbon::now()->addHours(6),
                'scheduleStatus'=> false,
                'scheduleContent'=> 'Schedule Time: 2PM - 6PM',
                'recyclingCategory'=> 'Paper',
                'stateName'=> 'Kelantan',
            ]
        ]);
    }
}