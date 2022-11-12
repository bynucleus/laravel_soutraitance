<?php

use Illuminate\Database\Seeder;

class ConsultantTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('consultant')->delete();
        
        \DB::table('consultant')->insert(array (
            0 => 
            array (
                'id' => 4,
                'nom' => 'jean lolipop',
                'daten' => '2022-10-14',
                'contact' => '0788364401',
                'emailperso' => 'sminth@gmail.com',
                'emailProf' => 'virtus225one@gmail.com',
                'poste' => 'BDA',
                'paysd' => 'Côte d\'Ivoire',
                'typepiece' => 'CNI',
                'adresse' => 'cocody',
                'npiece' => '01254789632',
                'created_at' => '2022-10-30 11:30:59',
                'updated_at' => '2022-10-30 11:30:59',
            ),
            1 => 
            array (
                'id' => 5,
                'nom' => 'ban doleres',
                'daten' => '2022-09-29',
                'contact' => '780214569',
                'emailperso' => 'dol@gmail.com',
                'emailProf' => 'dol@gmail.com',
                'poste' => 'Data scientiste',
                'paysd' => 'Côte d\'Ivoire',
                'typepiece' => 'CNI',
                'adresse' => 'Abobo',
                'npiece' => '0125478963',
                'created_at' => '2022-10-30 11:35:09',
                'updated_at' => '2022-10-30 11:35:09',
            ),
        ));
        
        
    }
}