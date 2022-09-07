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
            $table->string('nom', 30)->nullable();
            $table->string('prenom', 50)->nullable();
            $table->string('sexe')->nullable();
            $table->string('telephone')->unique()->nullable();
            $table->string('adresse', 100)->nullable();
            $table->string('email')->unique();
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
            $table->boolean('actif')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('numSite')->nullable();
            $table->integer('numUser')->nullable();
            $table->foreign('numSite')->references('id')->on('sites')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('numUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
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
