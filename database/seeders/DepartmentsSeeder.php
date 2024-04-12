<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hrm_departments')->insert([
            [
                'id' => 1,
                'department' => 'Administration',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
