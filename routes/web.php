<?php
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

Route::get('/', function () {
    return view('/frontend/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

include_route_files(base_path().'/routes/backend/admin');
include_route_files(base_path().'/routes/backend/user');
include_route_files(base_path().'/routes/frontend/authorized');
include_route_files(base_path().'/routes/frontend/unauthorized');

