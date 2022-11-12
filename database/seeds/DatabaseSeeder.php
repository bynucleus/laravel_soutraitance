<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(EntrepriseTableSeeder::class);
        $this->call(DevisesTableSeeder::class);
        $this->call(CaractRenumTableSeeder::class);
        $this->call(ConsultantTableSeeder::class);
        $this->call(MissionTableSeeder::class);
    }
}
