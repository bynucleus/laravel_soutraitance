<?php

use Illuminate\Database\Seeder;

class MissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('mission')->delete();

        \DB::table('mission')->insert(array (
            0 =>
            array (
                'id' => 1,
                'libelle' => NULL,
                'date_debut' => '2022-10-18',
                'date_fin' => '2022-11-06',
                'base_calcul' => 'mois',
                'id_devise' => '2',
                'id_caract_renum' => NULL,
                'poste' => 'Data scientiste',
                'description_poste' => 'poste de data scientiste',
                'nbre_heure' => NULL,
                'code_t' => 'OFF',
                'code_nt' => 'RDO',
                'jour_debut_semaine' => 'lundi',
                'id_entreprise_cliente' => 2,
                'id_entreprise_conseil' => 3,
                'id_consultant' => 5,
                'created_at' => '2022-10-30 12:34:24',
                'updated_at' => '2022-10-30 12:34:24',
            ),
            1 =>
            array (
                'id' => 2,
                'libelle' => NULL,
                'date_debut' => '2022-10-05',
                'date_fin' => '2022-10-30',
                'base_calcul' => NULL,
                'id_devise' => NULL,
                'id_caract_renum' => NULL,
                'poste' => NULL,
                'description_poste' => NULL,
                'nbre_heure' => NULL,
                'code_t' => "OFF",
                'code_nt' => "RDO",
                'jour_debut_semaine' => NULL,
                'id_entreprise_cliente' => 1,
                'id_entreprise_conseil' => 1,
                'id_consultant' => 4,
                'created_at' => '2022-10-30 12:46:01',
                'updated_at' => '2022-10-30 12:46:01',
            ),
        ));


    }
}
