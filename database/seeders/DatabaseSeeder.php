<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'email' => 'root@email.com',
                'name' => 'root',
                'password' => Hash::make('password'),
                'phoneNumber' => '0123456789',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        Organization::insert([
            [
                'userID' => 1,
                'organizationName' => 'rootOrg',
                'organizationCode' => '12345',
            ]
        ]);
    }
}
