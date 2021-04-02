<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::truncate();
        $sections = [
            ['section_code' => 'RCTMT', 'section_name' => 'Recruitment', 'department_code' => 'HR', 'updated_by' => 'admin'],
            ['section_code' => 'TAX', 'section_name' => 'Tax Payments', 'department_code' => 'ACNTG', 'updated_by' => 'admin'],
            ['section_code' => 'SAL', 'section_name' => 'Salary Management', 'department_code' => 'ACNTG', 'updated_by' => 'admin'],
            ['section_code' => 'ST', 'section_name' => 'Software Testing', 'department_code' => 'SD', 'updated_by' => 'admin'],
            ['section_code' => 'DEV', 'section_name' => 'Software Developer', 'department_code' => 'SD', 'updated_by' => 'admin'],
            ['section_code' => 'MAINT', 'section_name' => 'Software Maintenance', 'department_code' => 'SD', 'updated_by' => 'admin'],
            ['section_code' => 'NE', 'section_name' => 'Network Engineer', 'department_code' => 'IT', 'updated_by' => 'admin'],
            ['section_code' => 'TECH', 'section_name' => 'IT Technician', 'department_code' => 'IT', 'updated_by' => 'admin'],
        ];
        foreach ($sections as $key => $section) {
            Section::create($section);
        }
    }
}
