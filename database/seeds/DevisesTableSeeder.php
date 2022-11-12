<?php

use Illuminate\Database\Seeder;

class DevisesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('devises')->delete();
        
        \DB::table('devises')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'Dollar',
                'symbole' => '$ USD',
                'created_at' => '2022-10-30 08:46:04',
                'updated_at' => '2022-10-30 08:46:04',
            ),
            1 => 
            array (
                'id' => 2,
                'libelle' => 'Euro',
                'symbole' => '€',
                'created_at' => '2022-10-30 08:46:32',
                'updated_at' => '2022-10-30 08:46:32',
            ),
            2 => 
            array (
                'id' => 3,
                'libelle' => 'pound',
                'symbole' => '£',
                'created_at' => '2022-10-30 08:48:04',
                'updated_at' => '2022-10-30 08:48:04',
            ),
        ));
        
        
    }
}