<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\ServiceProvider;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $helpers_directory_path = base_path() .'/app/Helpers/';
        $helpers_core_directory_path = $helpers_directory_path . 'Core/';

        #Get the Core Ones First. Without them most of the other might not work
        require base_path() .'/app/Helpers/Core/FilesAndDirectoriesHelper.php';
        require base_path() .'/app/Helpers/Core/MenusHelper.php';
        require base_path() .'/app/Helpers/Core/MigrationsHelper.php';
        require base_path() .'/app/Helpers/Core/RoutesHelper.php';
        require base_path() .'/app/Helpers/Core/StringHelper.php';

    }

}
