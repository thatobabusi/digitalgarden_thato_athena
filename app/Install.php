<?php

namespace App;

use MadWeb\Initializer\Contracts\Runner;

class Install
{
    public function production(Runner $run)
    {

        return $run
            ->artisan('backup:run', ['--only-files'])
            ->external('composer', 'install', '--no-dev', '--prefer-dist', '--optimize-autoloader')
            ->artisan('key:generate', ['--force' => true])
            ->artisan('migrate', ['--force' => true])
            ->artisan('db:seed', ['--force' => true])
 //           ->artisan('storage:link')
//            ->dispatch(new MakeCronTask)
//            ->external('npm', 'install', '--production')
//            ->external('npm', 'run', 'production')
//            ->artisan('route:cache')
            ->artisan('route:clear')
            ->artisan('config:clear')
            ->artisan('cache:clear')
            ->artisan('view:clear')
            ->artisan('event:clear')
            ->artisan('clear-compiled')
            ->artisan('optimize:clear')
            ->external('composer', 'dumpautoload', '-o')
            ;
    }

    public function local(Runner $run)
    {
        return $run
            ->external('composer', 'install')
            ->artisan('key:generate')
            ->artisan('migrate')
            ->artisan('storage:link');
//            ->external('npm', 'install')
//            ->external('npm', 'run', 'development');
    }
}
