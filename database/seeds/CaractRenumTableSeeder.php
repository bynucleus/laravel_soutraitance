<?php

use Illuminate\Database\Seeder;

class CaractRenumTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('caract_renum')->delete();
        
        \DB::table('caract_renum')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'VOY',
                'description' => 'Jour de voyage',
                'percent' => '50',
                'created_at' => '2022-10-30 08:54:44',
                'updated_at' => '2022-10-30 08:54:44',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'ON',
                'description' => 'Onshore',
                'percent' => '50',
                'created_at' => '2022-10-30 08:55:03',
                'updated_at' => '2022-10-30 08:55:03',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'TR',
            'description' => 'Training (Formation)',
                'percent' => '50',
                'created_at' => '2022-10-30 08:55:17',
                'updated_at' => '2022-10-30 08:55:17',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'QR',
                'description' => 'Quarantaine',
                'percent' => '50',
                'created_at' => '2022-10-30 08:55:27',
                'updated_at' => '2022-10-30 08:55:27',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'OFF',
                'description' => 'Offshore',
                'percent' => '100',
                'created_at' => '2022-10-30 08:55:38',
                'updated_at' => '2022-10-30 08:55:38',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'SB',
                'description' => 'Stand By',
                'percent' => '50',
                'created_at' => '2022-10-30 08:55:52',
                'updated_at' => '2022-10-30 08:55:52',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'RDO',
            'description' => 'Rest day Off (jour de repos famille)',
                'percent' => '0',
                'created_at' => '2022-10-30 08:56:29',
                'updated_at' => '2022-10-30 08:56:29',
            ),
        ));
        
        
    }
}