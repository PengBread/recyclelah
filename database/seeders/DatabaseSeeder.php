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
            ScheduleSeeder::class
        ]);
        User::find(3)->update([
            'organizationID' => 1
        ]);
    }
}
