<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consultant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultant', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nom');
            $table->String('daten');
            $table->String('contact');
            $table->String('emailperso');
            $table->String('emailProf');
            $table->String('poste');
            $table->String('paysd');
            $table->String('typepiece');
            $table->String('adresse');
            $table->String('npiece');
            // $table->String('cv');
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
        //
    }
}
