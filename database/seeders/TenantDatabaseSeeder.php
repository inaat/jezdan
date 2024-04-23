<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            //\Database\Seeders\SystemSettingsSeeder::class,
          //  \Database\Seeders\UsersSeeder::class,
            \Database\Seeders\RolesSeeder::class
            ]);
    }


}
