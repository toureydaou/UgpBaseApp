<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            'nom' => 'Grand Lomé'
        ]);

        Region::create([
            'nom' => 'Maritime'
        ]);

        Region::create([
            'nom' => 'Plateaux'
        ]);

        Region::create([
            'nom' => 'Centrale'
        ]);

        Region::create([
            'nom' => 'Kara'
        ]);

        Region::create([
            'nom' => 'Savane'
        ]);
    }
}
