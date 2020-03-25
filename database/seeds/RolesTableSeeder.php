<?php

use App\Models\AccessControl\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('roles')->truncate();

        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 2,
                'title' => 'User',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 3,
                'title' => 'Teacher',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 4,
                'title' => 'Student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Role::insert($roles);
    }
}
