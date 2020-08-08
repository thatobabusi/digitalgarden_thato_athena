<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class NubianLaravelComposerDiagnose
 *
 * @package App\Console\Commands
 */
class NubianLaravelComposerDiagnose extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nubian:composer-diagnose';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Does a self diagnosis of the composer environment.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->warn('Starting Composer Environment Diagnosis');
        $this->warn('');
        $this->warn( shell_exec('composer diagnose') );
        $this->warn('');
        $this->warn('Finished Composer Environment Diagnosis');
    }
}
