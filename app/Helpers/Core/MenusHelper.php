<?php

if (! function_exists('build_frontend_menus')) {
    function build_frontend_menu($user)
    {
        if(!$user) {
            $user = 'TODO::We going to use this to pass on who it is so we can check permissions for some future conditions';
        }

        $main_nagivation_menu_items = config('navigationmenu.main_navigation', ['You have not set up the config.navigationmenu.php properly']);

        try {
            dd($main_nagivation_menu_items);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (! function_exists('build_backend_menu')) {
    function build_backend_menu($user)
    {
        try {
            //
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

