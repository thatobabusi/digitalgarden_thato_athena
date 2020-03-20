<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use PhpSchool\CliMenu\CliMenu;
use PhpSchool\CliMenu\Builder\CliMenuBuilder;
use PhpSchool\CliMenu\MenuItem\AsciiArtItem;
use PhpSchool\CliMenu\Style\CheckboxStyle;
use PhpSchool\CliMenu\Style\RadioStyle;

use PhpSchool\CliMenu\Style\SelectableStyle;

require_once(__DIR__ . '/../../../vendor/autoload.php');

class DigitalGarden extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nubian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $art = <<<ART

         _____ _           _          ____        _               _
        |_   _| |__   __ _| |_ ___   | __ )  __ _| |__  _   _ ___(_)
          | | | '_ \ / _` | __/ _ \  |  _ \ / _` | '_ \| | | / __| |
          | | | | | | (_| | || (_) | | |_) | (_| | |_) | |_| \__ \ |
          |_| |_| |_|\__,_|\__\___/  |____/ \__,_|_.__/ \__,_|___/_|

                     Dig!talGarden Media © T/A DGM
                              $copyright_date
                    $been_coding_since
                       $daysForExtraCoding
        ------------------------------------------------------------

ART;

        $menu = (new CliMenuBuilder)

            ->addAsciiArt($art, AsciiArtItem::POSITION_CENTER)

            ->setTitle('Laravel / `php artisan command:' . $this->signature .'`')
            ->setTitleSeparator('--')

            ->setForegroundColour('green')
            ->setBackgroundColour('black')

            ->enableAutoShortcuts()

            ->addLineBreak('-')

            ->addItem('0 [0] - Refresh', function (CliMenu $menu) {
                shell_exec('clear');
                $this->call('nubian');
            })
            ->addLineBreak('-')

            /*->addItem('1 [1] - App Install; Run the app::install command', function (CliMenu $menu) {
                $this->call('app:install');
            })
            ->addItem('2 [2] - App Update; Run the app::update command', function (CliMenu $menu) {
                $this->call('app:update');
            })
            ->addLineBreak('-')*/

            ->addItem('1 [1] - Analyse code; For PHP/Laravel standards (always run before commit/push/deploy)', function (CliMenu $menu) {
                $this->call('nubian:code-analysis');
                $this->warn('Finished. Click up to return to menu');
            })
            ->addItem('2 [2] - Backup project now. (Excludes Vendor folder)', function (CliMenu $menu) {
                $this->call('nubian:backup');
                $this->warn('Finished. Click up to return to menu');
                $this->warn('');
                $this->warn('Other commands include:');
                $this->warn('php artisan backup:clean (Deletes all backups)');
                $this->warn('php artisan backup:list (Lists all backups)');
            })

            ->addItem('3 [3] - Check for unused packages; Unused packages may slow down the project.', function (CliMenu $menu) {
                $this->call('nubian:unused-packages');
            })
            ->addItem('4 [4] - Clear Everything in one go; ', function (CliMenu $menu) {
                //composer dumpautoload -o && composer install
                $this->call('key:generate');
                $this->call('config:clear');
                $this->call('route:clear');
                $this->call('cache:clear');
                $this->call('view:clear');
                $this->warn('Finished. Click up to return to menu');
            })
            ->addItem('5 [5] - Clear Activity; Truncates all activity logs and Telescope as well.', function (CliMenu $menu) {
                $this->call('activitylog:clean');
                $this->call('telescope:clear');
                $this->warn('Finished. Click up to return to menu');
            })
            ->addItem('6 [6] - Diagnosis; Check if this projects\'s environment has been setup correctly', function (CliMenu $menu) {
                $this->call('nubian:self-diagnosis');
                $this->warn('Finished. Click up to return to menu');
            })
            ->addItem('7 [7] - Force Logout; Logs out all users', function (CliMenu $menu) {
                $this->call('key:generate');
                $this->warn('Finished. Click up to return to menu');
            })
            ->addItem('8 [8] - Update Models Ide-Helper; Updates all phpDoc blocks in Models', function (CliMenu $menu) {
                $this->call('ide-helper:models');
                $this->warn('Finished. Click up to return to menu');
            })

            ->addLineBreak('-')

            ->setBorder(1, 2, 'green')
            ->setPadding(2, 4)
            ->setMarginAuto()
            ->build();


        $menu->open();

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
