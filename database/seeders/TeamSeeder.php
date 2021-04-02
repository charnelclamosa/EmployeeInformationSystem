<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::truncate();
        $teams = [
            ['team_code' => 'HRNG', 'team_name' => 'Hiring', 'department_code' => 'HR', 'section_code' => 'RCTMT', 'updated_by' => 'admin'],
            ['team_code' => 'PYMNT', 'team_name' => 'Payment', 'department_code' => 'ACNTG', 'section_code' => 'TAX', 'updated_by' => 'admin'],
            ['team_code' => 'SAL1', 'team_name' => 'Salary Management - 1', 'department_code' => 'ACNTG', 'section_code' => 'SAL', 'updated_by' => 'admin'],
            ['team_code' => 'SAL2', 'team_name' => 'Salary Management - 2', 'department_code' => 'ACNTG', 'section_code' => 'SAL', 'updated_by' => 'admin'],
            ['team_code' => 'SAL3', 'team_name' => 'Salary Management - 3', 'department_code' => 'ACNTG', 'section_code' => 'SAL', 'updated_by' => 'admin'],
            ['team_code' => 'DOC', 'team_name' => 'Software Documentation', 'department_code' => 'QA', 'section_code' => 'ST', 'updated_by' => 'admin'],
            ['team_code' => 'FE', 'team_name' => 'Front end', 'department_code' => 'SD', 'section_code' => 'DEV', 'updated_by' => 'admin'],
            ['team_code' => 'BE', 'team_name' => 'Back end', 'department_code' => 'SD', 'section_code' => 'DEV', 'updated_by' => 'admin'],
            ['team_code' => 'UI/UX', 'team_name' => 'UI and UX', 'department_code' => 'SD', 'section_code' => 'DEV', 'updated_by' => 'admin'],
            ['team_code' => 'TRBL', 'team_name' => 'Troubleshoot', 'department_code' => 'SD', 'section_code' => 'MAINT', 'updated_by' => 'admin'],
            ['team_code' => 'TCNCL', 'team_name' => 'Technical', 'department_code' => 'IT', 'section_code' => 'TECH', 'updated_by' => 'admin'],
            ['team_code' => 'INV', 'team_name' => 'Inventory', 'department_code' => 'IT', 'section_code' => 'TECH', 'updated_by' => 'admin'],
            ['team_code' => 'LM', 'team_name' => 'License Management', 'department_code' => 'IT', 'section_code' => 'TECH', 'updated_by' => 'admin']
        ];
        foreach ($teams as $key => $team) {
            Team::create($team);
        }
    }
}
