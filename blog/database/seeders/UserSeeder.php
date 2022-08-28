<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        //

        User::create([
            'name' => 'toto',
            'email' => 'toto@gmail.com',
            'profil' => 'Admin',
            'password' => Hash::make('12345678'),
            'numPrescripteur' => 1
        ]);
    }
}
