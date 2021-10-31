<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::insert([
            [
                'userID' => 3,
                'organizationName' => 'testOrg',
                'organizationCode' => Str::random(7),
            ],
            [
                'userID' => 4,
                'organizationName' => 'test2',
                'organizationCode' => Str::random(7),
            ]
        ]);
        
    }
}
