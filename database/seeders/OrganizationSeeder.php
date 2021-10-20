<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

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
                // 'userID' => DB::table('users')->where('name', '=', 'test')->get('userID'),
                'organizationName' => 'Organization A',
                'organizationCode' => Str::random(7),
            ],
        ]);
    }
}
