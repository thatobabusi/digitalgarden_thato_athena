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
                'title' => 'Home',
                'url_link' => '/',
                'page_id' => 1,
                'type' => 'frontend_main_navigation',
                'route' => 'frontend.home',
                'icon' => '#',
                'permissions' => 'true',
                'parent_id' => '1',
                'has_children' => 'true',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'order' => 6,
                'title' => 'View Dashboard',
                'url_link' => '/admin',
                'page_id' => 1,
                'type' => 'frontend_main_navigation',
                'route' => '{{ route("admin.home") }}',
                'icon' => '#',
                'permissions' => 'false',
                'parent_id' => '1',
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'order' => NULL,
                'title' => 'Professional',
                'url_link' => '/professional',
                'page_id' => 2,
                'type' => 'frontend_main_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'true',
                'parent_id' => '1',
                'has_children' => 'true',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => '2020-03-17 12:19:35',
            ),
            3 =>
            array (
                'id' => 4,
                'order' => NULL,
                'title' => 'Personal',
                'url_link' => '/personal',
                'page_id' => 3,
                'type' => 'frontend_main_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'true',
                'parent_id' => '1',
                'has_children' => 'true',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => '2020-03-17 12:19:35',
            ),
            4 =>
            array (
                'id' => 5,
                'order' => 3,
                'title' => 'Blog',
                'url_link' => '/blog',
                'page_id' => 4,
                'type' => 'frontend_main_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'true',
                'parent_id' => '1',
                'has_children' => 'blog_post_categories',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'order' => 2,
                'title' => 'About',
                'url_link' => '/about',
                'page_id' => 5,
                'type' => 'frontend_main_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'true',
                'parent_id' => '1',
                'has_children' => 'true',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'order' => 4,
                'title' => 'Services',
                'url_link' => '/services',
                'page_id' => 6,
                'type' => 'frontend_main_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'true',
                'parent_id' => '1',
                'has_children' => 'true',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => '2020-03-17 12:19:35',
            ),
            7 =>
            array (
                'id' => 8,
                'order' => 5,
                'title' => 'Portfolio',
                'url_link' => '/portfolio',
                'page_id' => 7,
                'type' => 'frontend_main_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'true',
                'parent_id' => '1',
                'has_children' => 'true',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => '2020-03-17 12:19:35',
            ),
            8 =>
            array (
                'id' => 9,
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
            9 =>
            array (
                'id' => 10,
                'order' => 2,
                'title' => 'Press',
                'url_link' => '#',
                'page_id' => 1,
                'type' => 'frontend_footer_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'false',
            'parent_id' => '(NULL)',
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'order' => 3,
                'title' => 'Terms & Privacy',
                'url_link' => '#',
                'page_id' => 1,
                'type' => 'frontend_footer_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'false',
            'parent_id' => '(NULL)',
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => 12,
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
            12 =>
            array (
                'id' => 13,
                'order' => 5,
                'title' => 'Site Map',
                'url_link' => '#',
                'page_id' => 1,
                'type' => 'frontend_footer_navigation',
                'route' => '#',
                'icon' => '#',
                'permissions' => 'false',
            'parent_id' => '(NULL)',
                'has_children' => 'false',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => NULL,
            ),
        ));


    }
}
