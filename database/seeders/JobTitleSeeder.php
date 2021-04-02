<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobTitle::truncate();
        $titles = [
            ['job_code' => 'CEO', 'job_name' => 'Chief Executive Officer', 'updated_by' => 'admin'],
            ['job_code' => 'VP', 'job_name' => 'Vice President', 'updated_by' => 'admin'],
            ['job_code' => 'EXEC', 'job_name' => 'Executive', 'updated_by' => 'admin'],
            ['job_code' => 'ADMIN', 'job_name' => 'Administrator', 'updated_by' => 'admin'],
            ['job_code' => 'HR', 'job_name' => 'Human resource', 'updated_by' => 'admin'],
            ['job_code' => 'SUPR', 'job_name' => 'Supervisor', 'updated_by' => 'admin'],
            ['job_code' => 'MGR', 'job_name' => 'Manager', 'updated_by' => 'admin'],
            ['job_code' => 'DEVL', 'job_name' => 'Developer', 'updated_by' => 'admin'],
            ['job_code' => 'DSGN', 'job_name' => 'Designer', 'updated_by' => 'admin'],
            ['job_code' => 'ACCT', 'job_name' => 'Accountant', 'updated_by' => 'admin'],
            ['job_code' => 'FAC', 'job_name' => 'Faculty', 'updated_by' => 'admin'],
            ['job_code' => 'GSN', 'job_name' => 'General staff nurse', 'updated_by' => 'admin'],
            ['job_code' => 'INT', 'job_name' => 'Interim', 'updated_by' => 'admin'],
        ];
        foreach ($titles as $key => $title) {
            JobTitle::create($title);
        }
    }
}
