<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    public function run()
    {
        // Check if Superadmin role exists
        $role = Role::firstOrCreate(
            ['name' => 'superadmin'],
        );

        // Create Superadmin user
        User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('admin123'), // change to a secure password
                'role_id'  => $role->id,
                'permissions' => '["all"]',
                'status'   => 1
            ]
        );
    }
}
