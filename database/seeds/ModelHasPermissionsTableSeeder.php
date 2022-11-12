<?php

use Illuminate\Database\Seeder;

class ModelHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_permissions')->delete();
        
        \DB::table('model_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 4,
                'model_type' => 'App\\User',
                'model_id' => 1,
            ),
        ));
        
        
    }
}