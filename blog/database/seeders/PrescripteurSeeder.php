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
            'nom' => 'KANGA',
            'prenom' => 'Claude',
            'sexe' => 'Mr',
            'adresse' => 'Sokodé',
            'telephone' => '90664587',
            'email' => 'admin@gmail.com',
            'dateDebut' => '24/08/2022',
            'dateFin' => '30/11/2023',
            'numSite' => 1,
            'actif' => true,
            'avatar' => 'profils/malikpernon.png',
            'numUser' => 1
        ]);

        Prescripteur::create([
            'nom' => 'JHON',
            'prenom' => 'Rachid',
            'sexe' => 'Mr',
            'adresse' => 'Sokodé',
            'telephone' => '90258471',
            'email' => 'john@gmail.com',
            'dateDebut' => '24/08/2022',
            'numSite' => 2,
            'actif' => true,
            'avatar' => 'profils/malikpernon.png',
            'numUser' => 2
        ]);
    }
}
