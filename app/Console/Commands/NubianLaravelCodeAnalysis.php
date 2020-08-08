<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 * Class NubianLaravelCodeAnalysis
 *
 * @package App\Console\Commands
 */
class NubianLaravelCodeAnalysis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nubian:code-analysis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Does a code analysis of the source code to check if it conforms to PHP and Laravel standards.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$this->generateLogo();
        $this->warn('Starting PHP / Laravel Code Analysis');
        $this->warn('');
        $this->warn( shell_exec('./vendor/bin/phpstan analyse') ); //$this->warn( shell_exec('./vendor/bin/phpstan analyse --memory-limit=2G') );
        $this->warn('');
        $this->warn('Finished PHP / Laravel Code Analysis');

    }

    public function generateLogo()
    {

        #Been Coding Since
        $started_year = Carbon::create(2013, 5, 1);
        $current_year = Carbon::now();
        $been_coding_since = Carbon::createFromDate(2013, 5, 1)
            ->diff(Carbon::now())
            ->format('%y years, %m months and %d days');

        $copyright_date = $started_year->format('Y')." - ".$current_year->format('Y');

        #Coffee Cups Count
        $cups_of_coffee_a_day = 4;
        $annual_leave_days = 15;
        $diff_in_years = $started_year->diffInYears($current_year);
        $no_coffee_days = ($cups_of_coffee_a_day * $annual_leave_days) * $diff_in_years;

        $coffee_days = $started_year->diffInDaysFiltered(function(Carbon $date) { return !$date->isWeekend(); }, $current_year);
        $daysForExtraCoding = (($coffee_days * $cups_of_coffee_a_day) - $no_coffee_days ). " cups of coffee later...";

        $this->info("____________________________________________________________");
        $this->info("");
        $this->info(" _____ _           _          ____        _               _ ");
        $this->info("|_   _| |__   __ _| |_ ___   | __ )  __ _| |__  _   _ ___(_)");
        $this->info("  | | | '_ \ / _` | __/ _ \  |  _ \ / _` | '_ \| | | / __| |");
        $this->info("  | | | | | | (_| | || (_) | | |_) | (_| | |_) | |_| \__ \ |");
        $this->info("  |_| |_| |_|\__,_|\__\___/  |____/ \__,_|_.__/ \__,_|___/_|");
        $this->info("");
        $this->info("              Dig!talGarden Media © T/A DGM                  ");
        //$this->info("         eXtremeProgramming © T/A SoftwareLingo              ");
        $this->info("                         ".$copyright_date."                 ");
        $this->info("");
        $this->info("              $been_coding_since                             ");
        $this->info("                 $daysForExtraCoding                         ");
        $this->info("");
        $this->info("_____________________________________________________________");
        $this->info("");
    }
}
