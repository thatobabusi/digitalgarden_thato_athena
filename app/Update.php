<?php

namespace App;

use MadWeb\Initializer\Contracts\Runner;

class Update
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
            ->artisan('route:cache')
            ->artisan('config:cache')
            ->artisan('event:cache')
            ->artisan('migrate', ['--force' => false])  //never force migrate on live environment will delete everything
            ->artisan('cache:clear')
            ->artisan('queue:restart'); // ->artisan('horizon:terminate');

        /*return $run
            ->external('composer', 'install', '--no-dev', '--prefer-dist', '--optimize-autoloader')
            ->external('npm', 'install', '--production')
            ->external('npm', 'run', 'production')
            ->artisan('route:cache')
            ->artisan('config:cache')
            ->artisan('event:cache')
            ->artisan('migrate', ['--force' => true])
            ->artisan('cache:clear')
            ->artisan('queue:restart'); // ->artisan('horizon:terminate');*/
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
            ->artisan('migrate')
            ->artisan('cache:clear');

        /*return $run
            ->external('composer', 'install')
            ->external('npm', 'install')
            ->external('npm', 'run', 'development')
            ->artisan('migrate')
            ->artisan('cache:clear');*/
    }
}
