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
                'scheduleName'=> 'testOrganization1',
                'scheduleDateStart'=>Carbon::now(),
                'scheduleDateEnd'=>Carbon::now()->addHours(5),
                'scheduleStatus'=> false,
                'scheduleContent'=>'Schedule Time: 2PM - 6PM',
                'recyclingCategory'=>'Paper',
                'stateName'=>'Penang',
            ],
            [
                'organizationID' => '1',
                'scheduleName'=> 'testOrganization1',
                'scheduleDateStart'=>Carbon::now()->addDays(1)->addHours(1),
                'scheduleDateEnd'=>Carbon::now()->addDays(1)->addHours(2),
                'scheduleStatus'=> true,
                'scheduleContent'=> 'Schedule Time: 1PM - 4PM',
                'recyclingCategory'=> 'Plastic',
                'stateName'=> 'Selangor',
        
            ],
            [
                'organizationID' => '1',
                'scheduleName'=>'testOrganization1',
                'scheduleDateStart'=>Carbon::now()->addDays(2)->addHours(2),
                'scheduleDateEnd'=>Carbon::now()->addDays(2)->addHours(4),
                'scheduleStatus'=> false,
                'scheduleContent'=> 'Schedule Time: 2PM - 6PM',
                'recyclingCategory'=> 'Metal',
                'stateName'=> 'Kelantan',
            ],
            [
                'organizationID' => '2',
                'scheduleName'=>'testOrganization2',
                'scheduleDateStart'=>Carbon::now()->addDays(3)->addHours(3),
                'scheduleDateEnd'=>Carbon::now()->addDays(3)->addHours(6),
                'scheduleStatus'=> false,
                'scheduleContent'=> 'Schedule Time: 2PM - 6PM',
                'recyclingCategory'=> 'Paper',
                'stateName'=> 'Kelantan',
            ]
        ]);
    }
}