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
                'longitude' => 100.3287506,
                'latitude' => 5.414130699999999,
                'pointerAddress' => 'Georgetown',
                'pointerStatus' => 'Active',
                'recycleCategory' => 'Paper',
            ],
        ]);
    }
}
