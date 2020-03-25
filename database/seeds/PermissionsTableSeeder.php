<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->truncate();

        \DB::table('permissions')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'user_management_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'permission_create',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'permission_edit',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'title' => 'permission_show',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'title' => 'permission_delete',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'title' => 'permission_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'title' => 'role_create',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'title' => 'role_edit',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'title' => 'role_show',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'title' => 'role_delete',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'title' => 'role_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
                'title' => 'user_create',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'id' => 13,
                'title' => 'user_edit',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'id' => 14,
                'title' => 'user_show',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'id' => 15,
                'title' => 'user_delete',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            15 =>
            array (
                'id' => 16,
                'title' => 'user_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            16 =>
            array (
                'id' => 17,
                'title' => 'lesson_create',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            17 =>
            array (
                'id' => 18,
                'title' => 'lesson_edit',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            18 =>
            array (
                'id' => 19,
                'title' => 'lesson_show',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            19 =>
            array (
                'id' => 20,
                'title' => 'lesson_delete',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            20 =>
            array (
                'id' => 21,
                'title' => 'lesson_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            21 =>
            array (
                'id' => 22,
                'title' => 'school_class_create',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            22 =>
            array (
                'id' => 23,
                'title' => 'school_class_edit',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            23 =>
            array (
                'id' => 24,
                'title' => 'school_class_show',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            24 =>
            array (
                'id' => 25,
                'title' => 'school_class_delete',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            25 =>
            array (
                'id' => 26,
                'title' => 'school_class_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            26 =>
            array (
                'id' => 27,
                'title' => 'blog_management_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            27 =>
            array (
                'id' => 28,
                'title' => 'blog_post_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            28 =>
            array (
                'id' => 29,
                'title' => 'blog_post_categories_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            29 =>
            array (
                'id' => 30,
                'title' => 'blog_post_tags_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            30 =>
            array (
                'id' => 31,
                'title' => 'blog_post_images_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            31 =>
            array (
                'id' => 32,
                'title' => 'access_control_management_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            32 =>
            array (
                'id' => 33,
                'title' => 'activity_log_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
            33 =>
            array (
                'id' => 34,
                'title' => 'developer_tools_access',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL,
            ),
        ));
    }
}
