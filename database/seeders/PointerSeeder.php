<?php

namespace Database\Seeders;

use App\Models\MapPointer;
use Illuminate\Database\Seeder;

class PointerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MapPointer::insert([
            [
                'longitude' => 0,
                'latitude' => 0,
                'pointerAddress' => 'Georgetown',
                'pointerStatus' => 'Active',
                'recycleCategory' => 'Paper',
            ],
        ]);
    }
}
