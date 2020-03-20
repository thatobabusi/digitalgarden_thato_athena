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
            ],
            [
                'id'    => 2,
                'title' => 'User',
            ],
            [
                'id'    => 3,
                'title' => 'Teacher',
            ],
            [
                'id'    => 4,
                'title' => 'Student',
            ],
        ];

        Role::insert($roles);
    }
}
