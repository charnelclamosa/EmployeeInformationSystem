<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        $roles =[
            ['role_code' => 'AMN', 'role_name' => 'Administrator', 'updated_by' => '37871'],
            ['role_code' => 'USR', 'role_name' => 'User', 'updated_by' => '37871']
        ];
        foreach($roles as $key => $role) {
            Role::create($role);
        }
    }
}
