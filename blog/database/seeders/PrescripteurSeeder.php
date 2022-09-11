<?php

namespace Database\Seeders;

use App\Models\Prescripteur;
use Illuminate\Database\Seeder;

class PrescripteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Prescripteur::create([
            'nom' => 'COUBADJA',
            'prenom' => 'Mayi-mouna',
            'sexe' => 'Mme',
            'adresse' => 'Avedji',
            'telephone' => '90110754',
            'email' => 'admin@gmail.com',
            'dateDebut' => '24/08/2022',
            'numSite' => 1,
            'actif' => true,
            'avatar' => 'profils/malikpernon.png',
            'numUser' => 1
        ]);

    }
}
