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
            'email' => 'toto@gmail.com',
            'profil' => 'Admin',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'email' => 'john@gmail.com',
            'profil' => 'Prescription',
            'password' => Hash::make('12345678'),
        ]);
    }
}
