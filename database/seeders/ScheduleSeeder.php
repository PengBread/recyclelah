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
<<<<<<< HEAD
            'scheduleID'=>'1',
            'scheduleName'=>'asgdiuag',
            'scheduleDate'=>Carbon::today()->toDateString(),
            'scheduleTimeStart'=>Carbon::now()->toTimeString(),
            'scheduleTimeEnd'=>Carbon::now()->toTimeString(),
            'scheduleStatus'=>false,
            'scheduleContent'=>'LITTLE PIG LITTLE PIG LET. ME. IN',
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
            'scheduleContent'=>'SO YOU DO HAVE GUTS I"VE NEVER BEEN THIS WRONG IS MY WHOLE DAMN LIFE',
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
            'scheduleContent'=>'YEP ITS GONNA BE PEE PEE PANTS HERE REAL SOON',
            'recyclingCatagory'=>'paper',
            'stateName'=>'kelanteh',
            ],
            [
                'scheduleID'=>'7',
                'scheduleName'=>'uefueuiofiuowqgiofdq',
                'scheduleDate'=>Carbon::today()->toDateString(),
                'scheduleTimeStart'=>Carbon::now()->toTimeString(),
                'scheduleTimeEnd'=>Carbon::now()->toTimeString(),
                'scheduleStatus'=>false,
                'scheduleContent'=>'I JUST POPPED YOUR SKULL SO HARD YOUR EYEBALL JUST POPPED OUT...GROSS AS SHIT',
                'recyclingCatagory'=>'paper',
                'stateName'=>'kelanteh',
            ]
=======
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
>>>>>>> 16b862ea7264a3146b86e951a31ce734648c5608
        ]);
    }
}
