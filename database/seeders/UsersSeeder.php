<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'surname' => 'MR',
                'user_type' => 'admin',
                'hook_id' => '1',
                'first_name' => 'test',
                'last_name' => 'test',
                'email' => 'inayatullahkks@gmail.com',
                'password' => 1,
                'campus_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
