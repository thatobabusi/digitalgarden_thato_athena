<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Class Kernel
 *
 * @package App\Console
 */
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
        #TODO:: Remember to run crontab -e to activate
        $schedule->command('nubian:backup')->dailyAt('06:00');
        $schedule->command('nubian:backup')->dailyAt('09:00');
        $schedule->command('nubian:backup')->dailyAt('12:00');
        $schedule->command('nubian:backup')->dailyAt('15:00');
        $schedule->command('nubian:backup')->dailyAt('18:00');
        $schedule->command('nubian:backup')->dailyAt('21:00');
        $schedule->command('nubian:backup')->dailyAt('00:00');
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
