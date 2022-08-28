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
            'nom' => 'toto',
            'prenom' => 'toto',
            'sexe' => 'Mr',
            'adresse' => 'Sokodé',
            'telephone' => '90664587',
            'email' => 'toto@gmail.com',
            'dateDebut' => '24/08/2022',
            'dateFin' => '30/11/2023',
            'site' => 'tambalo',
            'actif' => true,
            'formation' => 'Géomètre',
            'code' => 'ki57yh',
            'avatar' => 'profils/malikpernon.png'
        ]);
    }
}
