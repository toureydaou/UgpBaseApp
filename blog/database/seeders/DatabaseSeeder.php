<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Prescripteur;
use App\Models\Site;
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
            //RegionSeeder::class,
            //DistrictSeeder::class,
            UserSeeder::class,
            PrescripteurSeeder::class,
        ]);
    }
}
