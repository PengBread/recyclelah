<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'organizationID' => null,
                'email' => 'root@email.com',
                'name' => 'root',
                'password' => Hash::make('password'),
                'phoneNumber' => '0123456789',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'organizationID' => null,
                'email' => 'test@gmail.com',
                'name' => 'test',
                'password' => Hash::make('test1234'),
                'phoneNumber' => '0124108873',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'organizationID' => null,
                'email' => 'test2@gmail.com',
                'name' => 'test2',
                'password' => Hash::make('test1234'),
                'phoneNumber' => '0124555555',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
