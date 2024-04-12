<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hrm_employees')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'campus_id' => 1,
                'employeeID' => 'Em-0055',
                'old_EmpID' => null,
                'first_name' => 'inayat',
                'last_name' => 'ullah',
                'email' => 'inayatullahkks@gmail.com',
                'password' => '$2y$10$uEdAp6rZdelZsJWlwGUBT.BFVFKVyolQ54.c9Bs.BKKUSzsKxcESK', // bcrypt hashed password
                'gender' => 'male',
                'father_name' => 'MUHAMMAD HUSSAIN',
                'mobile_no' => '+923428927305',
                'basic_salary' => 0.0000,
                'default_allowance' => 0.0000,
                'default_deduction' => 0.0000,
                'pay_period' => 'month',
                'pay_cycle' => null,
                'birth_date' => '2024-01-26',
                'department_id' => 1,
                'designation_id' => 21,
                'education_id' => null,
                'education_ids' => '["1"]',
                'joining_date' => '2024-01-26',
                'employee_image' => 'storage/tenantsaadschool/employee_image/Em-0055.png',
                'country_id' => 91,
                'province_id' => 1,
                'district_id' => 1,
                'city_id' => 1,
                'region_id' => 2,
                'current_address' => 'Swat Khwaza Khela Pakistan',
                'permanent_address' => null,
                'nationality' => 'Pakistani',
                'mother_tongue' => null,
                'annual_leave' => 0,
                'status' => 'active',
                'religion' => 'Islam',
                'cnic_no' => null,
                'blood_group' => null,
                'bank_details' => '{"account_name":"superadmin@gmail.com","account_number":null,"bank":null,"bin":null,"branch":null,"tax_payer_id":null}',
                'resign_remark' => null,
                'remark' => null,
                'M_Status' => null,
                'last_login' => null,
                'remember_token' => null,
                'exit_date' => null,
                'reset_code' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
