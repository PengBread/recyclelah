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
                'password' => Hash::make('password1'),
                'phoneNumber' => '0123456789',
                'isVerified' => 1,
                'created_at' => Carbon::now('Asia/Singapore'),
                'updated_at' => Carbon::now('Asia/Singapore')
            ],
            [
                'organizationID' => null,
                'email' => 'test@gmail.com',
                'name' => 'test',
                'password' => Hash::make('test1234'),
                'phoneNumber' => '0124108873',
                'isVerified' => 1,
                'created_at' => Carbon::now('Asia/Singapore'),
                'updated_at' => Carbon::now('Asia/Singapore'),
            ],
            [
                'organizationID' => null,
                'email' => 'test2@gmail.com',
                'name' => 'test2',
                'password' => Hash::make('test1234'),
                'phoneNumber' => '0124555555',
                'isVerified' => 1,
                'created_at' => Carbon::now('Asia/Singapore'),
                'updated_at' => Carbon::now('Asia/Singapore'),
            ],
            [
                'organizationID' => null,
                'email' => 'test3@gmail.com',
                'name' => 'test3',
                'password' => Hash::make('test1234'),
                'phoneNumber' => '0124555558',
                'isVerified' => 1,
                'created_at' => Carbon::now('Asia/Singapore'),
                'updated_at' => Carbon::now('Asia/Singapore'),
            ],
            [
                'organizationID' => null,
                'email' => 'something@something.com',
                'name' => 'something',
                'password' => Hash::make('password2'),
                'phoneNumber' => '0121112222',
                'isVerified' => 1,
                'created_at' => Carbon::now('Asia/Singapore'),
                'updated_at' => Carbon::now('Asia/Singapore'),
            ]
        ]);
    }
}