<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DeptA760k0qWCUEQF/5MmuTQhIm.q0zzmnNqUQB3kUZ4GJGRDxlhC',
                'remember_token' => 'rb0ep7jzpyHigBjnQwUbWf83tYVRJStyApeGvME9g4dskcJs2oR2sSMWE2Dw',
                'created_at' => '2021-07-12 19:05:15',
                'updated_at' => '2021-07-12 19:05:15',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'sminth',
                'email' => 'virtus225one@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DeptA760k0qWCUEQF/5MmuTQhIm.q0zzmnNqUQB3kUZ4GJGRDxlhC',
                'remember_token' => '34eUUFcWvkkS0ImHc5ZwzsCswedbJJKR5L1M6UkuA7rp6horbEkimMqH2ds4',
                'created_at' => '2021-07-12 19:05:15',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'KOUADIO LOLIPOP',
                'email' => 'loli@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$EcdySqFB8t3ToGtmI6fGZuMSiCYFRSbVVlWKWwT9RHbI4tBNxiG8S',
                'remember_token' => NULL,
                'created_at' => '2022-10-30 09:12:12',
                'updated_at' => '2022-10-30 09:12:12',
            ),
            3 => 
            array (
                'id' => 12,
                'name' => 'jean lolipop',
                'email' => 'sminth@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$.yxioBrBaQ/GhJxxoGx4YOzl7zJ82yq1f/PRsJtk9BX49pxChINsO',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 13,
                'name' => 'ban doleres',
                'email' => 'dol@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CyTTun9FY4aQ/ZpdgDwqvO0ktKTrM2wnC3BZRTunXIXpcUqoBCDDC',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}