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
                'scheduleName'=> 'We love Bananas',
                'scheduleDateStart'=> Carbon::now('Asia/Singapore'),
                'scheduleDateEnd'=> Carbon::now('Asia/Singapore')->addHours(5),
                'scheduleStatus'=> true,
                'scheduleContent'=> 'We are scheduling a pickup in Bukit Dumbar. The time is 2PM - 6PM. I like birds by the way.',
                'recyclingCategory'=>'Paper',
                'stateName'=>'Penang',
            ],
            [
                'organizationID' => '1',
                'scheduleName'=> 'We love Bananas',
                'scheduleDateStart'=>Carbon::now('Asia/Singapore')->addDays(1)->addHours(1),
                'scheduleDateEnd'=>Carbon::now('Asia/Singapore')->addDays(1)->addHours(2),
                'scheduleStatus'=> true,
                'scheduleContent'=> 'We are scheduling a pickup in Georgetown. The time is 1PM - 4PM',
                'recyclingCategory'=> 'Plastic',
                'stateName'=> 'Selangor',
        
            ],
            [
                'organizationID' => '1',
                'scheduleName'=>'We love Bananas',
                'scheduleDateStart'=>Carbon::now('Asia/Singapore')->addDays(2)->addHours(2),
                'scheduleDateEnd'=>Carbon::now('Asia/Singapore')->addDays(2)->addHours(4),
                'scheduleStatus'=> true,
                'scheduleContent'=> 'We are scheduling a pickup in Butterworth. The time is 2PM - 6PM',
                'recyclingCategory'=> 'Metal',
                'stateName'=> 'Kelantan',
            ],
            [
                'organizationID' => '2',
                'scheduleName'=>'Green green bird',
                'scheduleDateStart'=>Carbon::now('Asia/Singapore')->addDays(3)->addHours(3),
                'scheduleDateEnd'=>Carbon::now('Asia/Singapore')->addDays(3)->addHours(6),
                'scheduleStatus'=> true,
                'scheduleContent'=> 'We are scheduling a pickup in Ayer Itam. The time is 2PM - 6PM',
                'recyclingCategory'=> 'Paper',
                'stateName'=> 'Kelantan',
            ]
        ]);
    }
}