<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            OrganizationSeeder::class,
            ScheduleSeeder::class,
            PointerSeeder::class
        ]);
        User::find(2)->update([
            'pointerID' => 1
        ]);
        User::find(3)->update([
            'organizationID' => 1
        ]);
        User::find(4)->update([
            'organizationID' => 2
        ]);
        
    }
}