<?php

use Illuminate\Database\Seeder;

class FeuilleTempsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('feuille_temps')->delete();
        
        \DB::table('feuille_temps')->insert(array (
            0 => 
            array (
                'id' => 5,
                'numero' => NULL,
                'id_mission' => 1,
                'date_debut' => '2022-10-17',
                'date_fin' => '2022-10-23',
                'etat' => 'enregistrer',
                'created_at' => '2022-11-13 07:32:14',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}