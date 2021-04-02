<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();
        $departments = [
            ['department_code' => 'HR', 'department_name' => ' Human Resource', 'updated_by' => 'admin'],
            ['department_code' => 'ACNTG', 'department_name' => 'Accounting', 'updated_by' => 'admin'],
            ['department_code' => 'QA', 'department_name' => 'Quality Assurance', 'updated_by' => 'admin'],
            ['department_code' => 'SD', 'department_name' => 'Software Development', 'updated_by' => 'admin'],
            ['department_code' => 'IT', 'department_name' => 'Information Technology', 'updated_by' => 'admin'],
        ];
        foreach ($departments as $key => $department) {
            Department::create($department);
        }
    }
}
