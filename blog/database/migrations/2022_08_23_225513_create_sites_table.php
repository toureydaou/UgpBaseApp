<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('sites', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nom');
            $table->integer('numDistrict');
            $table->foreign('numDistrict')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->primary('id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
