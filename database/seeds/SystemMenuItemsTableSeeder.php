<?php

use Illuminate\Database\Seeder;

class SystemMenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('system_menu_items')->truncate();

        \DB::table('system_menu_items')->insert(array (
            0 =>
            array (
                'id' => 1,
                'order' => 1,
                'title' => 'Blog',
                'url_link' => '/blog',
                'page_id' => NULL,
                'type' => 'frontend_main_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'true',
                'parent_id' => NULL,
                'has_children' => 'blog_post_categories',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),

            1 =>
                array (
                    'id' => 2,
                    'order' => 2,
                    'title' => 'Contact',
                    'url_link' => '/contact',
                    'page_id' => NULL,
                    'type' => 'frontend_main_navigation',
                    'route' => '#',
                    'icon' => '#',
                    'permissions' => 'true',
                    'parent_id' => NULL,
                    'has_children' => 'false',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    'deleted_at' => NULL,
                ),

            2 =>
            array (
                'id' => 3,
                'order' => 1,
                'title' => 'News',
                'url_link' => '#',
                'page_id' => 1,
                'type' => 'frontend_footer_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'false',
                'parent_id' => NULL,
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),

            3 =>
            array (
                'id' => 4,
                'order' => 2,
                'title' => 'Press',
                'url_link' => '#',
                'page_id' => 1,
                'type' => 'frontend_footer_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'false',
                'parent_id' => NULL,
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),

            4 =>
            array (
                'id' => 5,
                'order' => 3,
                'title' => 'Terms & Privacy',
                'url_link' => '#',
                'page_id' => 1,
                'type' => 'frontend_footer_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'false',
                'parent_id' => NULL,
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),

            5 =>
            array (
                'id' => 6,
                'order' => 4,
                'title' => 'We are Hiring',
                'url_link' => '#',
                'page_id' => 1,
                'type' => 'frontend_footer_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'false',
                'parent_id' => NULL,
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),

            6 =>
            array (
                'id' => 7,
                'order' => 5,
                'title' => 'Site Map',
                'url_link' => '/sitemap',
                'page_id' => 1,
                'type' => 'frontend_footer_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'false',
                'parent_id' => NULL,
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),
        ));


    }
}
