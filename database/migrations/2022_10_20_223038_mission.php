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
            $table->String('libelle')->nullable();
            $table->Date('date_debut');
            $table->Date('date_fin');
            $table->String('base_calcul')->nullable();
            $table->String('id_devise')->nullable();
            $table->String('id_caract_renum')->nullable();
            $table->String('poste')->nullable();
            $table->String('description_poste')->nullable();
            $table->bigInteger('nbre_heure')->nullable();
            $table->String('code_t')->default("OFF");
            $table->String('code_nt')->default("RDO");
            $table->String('jour_debut_semaine')->nullable();
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
