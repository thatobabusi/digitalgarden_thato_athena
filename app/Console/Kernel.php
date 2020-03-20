<?php

namespace App\Console;

use App\Console\Commands\NubianLaravelBackupAndSelfDiagnosis;
use App\Console\Commands\NubianPHPStanAnalyse;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        /* Takes anything that's in the commands folder which is desired outcome*/
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');


    }
}
