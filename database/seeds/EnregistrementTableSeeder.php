<?php

use Illuminate\Database\Seeder;

class EnregistrementTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('enregistrement')->delete();
        
        \DB::table('enregistrement')->insert(array (
            0 => 
            array (
                'id' => 9,
                'id_feuille_temps' => 5,
                'date' => '2022-10-17',
                'code_renumeration' => 'RDO',
                'nbre_heure' => '6',
                'created_at' => '2022-11-13 07:32:14',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 10,
                'id_feuille_temps' => 5,
                'date' => '2022-10-18',
                'code_renumeration' => 'OFF',
                'nbre_heure' => '8',
                'created_at' => '2022-11-13 07:32:14',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 11,
                'id_feuille_temps' => 5,
                'date' => '2022-10-19',
                'code_renumeration' => 'OFF',
                'nbre_heure' => '8',
                'created_at' => '2022-11-13 07:32:14',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 12,
                'id_feuille_temps' => 5,
                'date' => '2022-10-20',
                'code_renumeration' => 'ON',
                'nbre_heure' => '6',
                'created_at' => '2022-11-13 07:32:14',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 13,
                'id_feuille_temps' => 5,
                'date' => '2022-10-21',
                'code_renumeration' => 'ON',
                'nbre_heure' => '7',
                'created_at' => '2022-11-13 07:32:14',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 14,
                'id_feuille_temps' => 5,
                'date' => '2022-10-22',
                'code_renumeration' => 'OFF',
                'nbre_heure' => '8',
                'created_at' => '2022-11-13 07:32:14',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 15,
                'id_feuille_temps' => 5,
                'date' => '2022-10-23',
                'code_renumeration' => 'OFF',
                'nbre_heure' => '8',
                'created_at' => '2022-11-13 07:32:14',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}