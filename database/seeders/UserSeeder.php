<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = new User;
        $user->name = 'System Administrator';
        $user->username = 'admin';
        $user->password = Hash::make('admin');
        $user->role_code = 1;
        $user->updated_by = 'admin';
        $user->save();
    }
}
