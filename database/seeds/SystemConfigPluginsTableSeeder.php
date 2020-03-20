<?php

use Illuminate\Database\Seeder;

class SystemConfigPluginsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('system_config_plugins')->truncate();

        \DB::table('system_config_plugins')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Backend Modules',
                'backend_frontend' => 'Backend',
                'parent_id' => NULL,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Frontend Modules',
                'backend_frontend' => 'Backend',
                'parent_id' => NULL,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'Access Control Management',
                'backend_frontend' => 'Backend',
                'parent_id' => 1,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            3 =>
            array (
                'id' => 4,
                'title' => 'Activity Log',
                'backend_frontend' => 'Backend',
                'parent_id' => 1,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            4 =>
            array (
                'id' => 5,
                'title' => 'Blog Management',
                'backend_frontend' => 'Backend',
                'parent_id' => 1,
                'realted_id' => '18',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            5 =>
            array (
                'id' => 6,
                'title' => 'Developer Tools',
                'backend_frontend' => 'Backend',
                'parent_id' => 1,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            6 =>
            array (
                'id' => 7,
                'title' => 'Config settings',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            7 =>
            array (
                'id' => 8,
                'title' => 'Code Editor',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            8 =>
            array (
                'id' => 9,
                'title' => 'CRUD Generator',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            9 =>
            array (
                'id' => 10,
                'title' => 'Pages Manager',
                'backend_frontend' => 'Backend',
                'parent_id' => NULL,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            10 =>
            array (
                'id' => 11,
                'title' => 'Menu Manager',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            11 =>
            array (
                'id' => 12,
                'title' => 'Migration Manager',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            12 =>
            array (
                'id' => 13,
                'title' => 'Module Manager',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            13 =>
            array (
                'id' => 14,
                'title' => 'Route Browser',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            14 =>
            array (
                'id' => 15,
                'title' => 'Telescope',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            15 =>
            array (
                'id' => 16,
                'title' => 'Terminal',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            16 =>
            array (
                'id' => 17,
                'title' => 'Uploads Manager',
                'backend_frontend' => 'Backend',
                'parent_id' => 6,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            17 =>
            array (
                'id' => 18,
                'title' => 'User Management',
                'backend_frontend' => 'Backend',
                'parent_id' => 1,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            18 =>
            array (
                'id' => 19,
                'title' => 'Home',
                'backend_frontend' => 'Frontend',
                'parent_id' => 2,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Core',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            19 =>
            array (
                'id' => 20,
                'title' => 'Blog',
                'backend_frontend' => 'Frontend',
                'parent_id' => 2,
                'realted_id' => '5',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            20 =>
            array (
                'id' => 21,
                'title' => 'About',
                'backend_frontend' => 'Frontend',
                'parent_id' => 2,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            21 =>
            array (
                'id' => 22,
                'title' => 'Services',
                'backend_frontend' => 'Frontend',
                'parent_id' => 2,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            22 =>
            array (
                'id' => 23,
                'title' => 'Portfolio',
                'backend_frontend' => 'Frontend',
                'parent_id' => 2,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            23 =>
            array (
                'id' => 24,
                'title' => 'Twitter Feed Plugin',
                'backend_frontend' => 'Frontend',
                'parent_id' => 2,
            'realted_id' => '(NULL)',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            24 =>
            array (
                'id' => 25,
                'title' => 'Blog Search',
                'backend_frontend' => 'Frontend',
                'parent_id' => 19,
                'realted_id' => '19',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            25 =>
            array (
                'id' => 26,
                'title' => 'Blog Recommended',
                'backend_frontend' => 'Frontend',
                'parent_id' => 19,
                'realted_id' => '19',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            26 =>
            array (
                'id' => 27,
                'title' => 'Blog Categories',
                'backend_frontend' => 'Frontend',
                'parent_id' => 19,
                'realted_id' => '19',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            27 =>
            array (
                'id' => 28,
                'title' => 'Blog Tags',
                'backend_frontend' => 'Frontend',
                'parent_id' => 19,
                'realted_id' => '19',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
            28 =>
            array (
                'id' => 29,
                'title' => 'Blog Archives',
                'backend_frontend' => 'Frontend',
                'parent_id' => 19,
                'realted_id' => '19',
                'core_or_optional' => 'Optional',
                'enabled' => 1,
                'created_at' => '2020-03-16 12:15:54',
                'updated_at' => '2020-03-16 12:15:54',
            ),
        ));


    }
}