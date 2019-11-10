<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use PhpSchool\CliMenu\CliMenu;

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
        $this->call('app:install');

        $this->call('self-diagnosis');

        /*$menu = $this->menu('Pizza menu')
            ->addOption('mozzarella', 'Mozzarella')
            ->addOption('chicken_parm', 'Chicken Parm')
            ->addOption('sausage', 'Sausage')
            ->addQuestion('Make your own', 'Describe your pizza...');

        $itemCallable = function (CliMenu $cliMenu) use ($menu) {
            $cliMenu->askPassword()
                ->setValidator(function ($password) {
                    return $password === 'secret';
                })
                ->setPromptText('Secret password?')
                ->ask();

            $menu->setResult('Free spice!');

            $cliMenu->close();
        };
        $menu->addItem('Add extra spice for free (password needed)', $itemCallable);


        $option = $menu->addOption('burger', 'Prefer burgers')
            ->setWidth(80)
            ->open();*/

        //$this->info("You have chosen the text option: $option");

    }
}
