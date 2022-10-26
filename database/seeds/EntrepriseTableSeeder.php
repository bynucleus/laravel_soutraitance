<?php

use Illuminate\Database\Seeder;

class EntrepriseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('entreprise')->delete();
        
        \DB::table('entreprise')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Nucleus corporation',
                'secteurActivite' => 'informatique',
                'localisation' => NULL,
                'adresse' => 'cocody',
                'id_user' => 3,
                'created_at' => '2022-10-26 11:12:02',
                'updated_at' => '2022-10-26 11:12:02',
            ),
        ));
        
        
    }
}