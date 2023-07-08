<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Create Roles
        $roles = [
            1 => 'superadmin',
            2 => 'admin',
            3 => 'user',
            4 => 'student',
        ];

        foreach ($roles as $roleId => $roleName) {
            Role::create(['id' => $roleId,'name' => $roleName, 'note' => 'created by software']);
        }

        // Create Superadmin
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
        $superadmin->assignRole($superadmin->role->name);

        // Create Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);
        $admin->assignRole($admin->role->name);

        // Create General User
        $generalUser = User::create([
            'name' => 'General User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
        ]);
        $generalUser->assignRole($generalUser->role->name);

        // Create Student
        $student = User::create([
            'name' => 'Student',
            'email' => 'student@example.com',
            'password' => bcrypt('password'),
            'role_id' => 4,
        ]);
        $student->assignRole($student->role->name);

    }
}
