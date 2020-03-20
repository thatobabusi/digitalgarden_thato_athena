<?php

namespace App;

use MadWeb\Initializer\Contracts\Runner;

class Install
{
    /**
     * @param Runner $run
     *
     * @return Runner
     */
    public function production(Runner $run)
    {
        return $run
            ->external('composer', 'install', '--no-dev', '--prefer-dist', '--optimize-autoloader')
            ->artisan('key:generate', ['--force' => true]) //forcing keygen logs everyone thats logged in out
            ->artisan('migrate', ['--force' => false]) //never force migrate on live environment will delete everything
            ->artisan('storage:link')
            ->artisan('route:cache')
            ->artisan('config:cache')
            ->artisan('event:cache');

        /*return $run
            ->external('composer', 'install', '--no-dev', '--prefer-dist', '--optimize-autoloader')
            ->artisan('key:generate', ['--force' => true])
            ->artisan('migrate', ['--force' => true])
            ->artisan('storage:link')
//            ->dispatch(new MakeCronTask)
            ->external('npm', 'install', '--production')
            ->external('npm', 'run', 'production')
            ->artisan('route:cache')
            ->artisan('config:cache')
            ->artisan('event:cache');*/
    }

    /**
     * @param Runner $run
     *
     * @return Runner
     */
    public function local(Runner $run)
    {
        return $run
            ->external('composer', 'install')
            ->artisan('key:generate')
            ->artisan('migrate');

        /*return $run
            ->external('composer', 'install')
            ->artisan('key:generate')
            ->artisan('migrate')
            ->artisan('storage:link')
            ->external('npm', 'install')
            ->external('npm', 'run', 'development');*/
    }
}
