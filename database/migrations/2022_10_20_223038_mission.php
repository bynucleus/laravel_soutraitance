<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('libelle');
            $table->Date('date_debut');
            $table->Date('date_fin');
            $table->unsignedBigInteger('id_entreprise_cliente');
            $table->unsignedBigInteger('id_entreprise_conseil');
            $table->unsignedBigInteger('id_consultant');
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
