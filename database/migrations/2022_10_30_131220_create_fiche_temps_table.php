<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFicheTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feuille_temps', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->nullable();
            $table->integer('id_mission');
            $table->Date('date_debut');
            $table->Date('date_fin');
            $table->String('etat');
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
        Schema::dropIfExists('fiche_temps');
    }
}
