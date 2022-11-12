<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2020-10-13 04:45:28',
                'updated_at' => '2020-11-14 03:53:50',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'consultant',
                'guard_name' => 'web',
                'created_at' => '2020-11-14 03:34:37',
                'updated_at' => '2022-10-30 09:07:24',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'entreprise cliente',
                'guard_name' => 'web',
                'created_at' => '2022-10-30 09:07:36',
                'updated_at' => '2022-10-30 09:07:36',
            ),
        ));
        
        
    }
}