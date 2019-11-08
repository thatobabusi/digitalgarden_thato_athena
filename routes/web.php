<?php

use function Composer\Autoload\includeFile;

function include_route_files($folder)
{
    try {
        $rdi = new recursiveDirectoryIterator($folder);
        $it = new recursiveIteratorIterator($rdi);

        while ($it->valid()) {
            if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                require $it->key();
            }

            $it->next();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function build_frontend_menu($user)
{
    if(!$user) {
        $user = 'TODO::We going to use this to pass on who it is so we can check permissions for some future conditions';
    }

    $main_nagivation_menu_items = config('navigationmenu.main_navigation', ['You have not set up the config.navigationmenu.php properly']);

    try {

        $menu = "";

        foreach($main_nagivation_menu_items as $menu_item) {

            $dropdown_toggle = true;
            $dropdown = true;
            $icon = "fa fa-angle-down";

            $menu .= "<li class=\"dropdown active\">
                            <a href=\"#\" class=\"$dropdown_toggle\" data-toggle=\"$dropdown\">$menu_item <i class=\"$icon\"></i></a>
                            <ul class=\"dropdown-menu\" role=\"menu\">
                                <li><a href=\"index.html\">Home Default</a></li>
                                <li class=\"active\"><a href=\"index-blog.html\">Home Blog</a></li>
                            </ul>
                        </li>";


        }$menu = "";

        foreach($main_nagivation_menu_items as $menu_item) {

            $dropdown_toggle = true;
            $dropdown = true;
            $icon = "fa fa-angle-down";

            $menu .= "<li class=\"dropdown active\">
                            <a href=\"#\" class=\"$dropdown_toggle\" data-toggle=\"$dropdown\">$menu_item <i class=\"$icon\"></i></a>
                            <ul class=\"dropdown-menu\" role=\"menu\">
                                <li><a href=\"index.html\">Home Default</a></li>
                                <li class=\"active\"><a href=\"index-blog.html\">Home Blog</a></li>
                            </ul>
                        </li>";


        }

        /*$test = "<li class=\"dropdown active\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">HOME <i class=\"fa fa-angle-down\"></i></a>
                    <ul class=\"dropdown-menu\" role=\"menu\">
                        <li><a href=\"index.html\">Home Default</a></li>
                        <li class=\"active\"><a href=\"index-blog.html\">Home Blog</a></li>
                    </ul>
                </li>";
        */
        dd($main_nagivation_menu_items);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/thato/1', 'Frontend\BlogController@index')->name('thato.test');


Route::get('/', function () {
    return view('/frontend/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

include_route_files(base_path().'/routes/backend/admin');
include_route_files(base_path().'/routes/backend/user');
include_route_files(base_path().'/routes/frontend/authorized');
include_route_files(base_path().'/routes/frontend/unauthorized');

