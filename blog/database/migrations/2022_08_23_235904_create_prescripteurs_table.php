<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescripteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescripteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 30);
            $table->string('prenom', 50);
            $table->string('sexe');
            $table->string('telephone')->unique();
            $table->string('adresse', 100);
            $table->string('email')->unique();
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('site', 50);
            $table->boolean('actif');
            $table->string('formation');
            $table->string('code', 256)->unique();
            $table->string('avatar')->nullable();
            $table->timestamps();
            //$table->unique(['nom', 'prenom']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescripteurs');
    }
}
