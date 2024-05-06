<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Laravel\Prompts\Output\ConsoleOutput;
use Symfony\Component\Console\Helper\ProgressBar;

class OppakInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oppak:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instalasi awal oppak';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $artisantorun = [
            "migrate",
            "key:generate",
            "storage:link",
        ];

        $this->withProgressBar($artisantorun, function($command){
            sleep(1);
            Artisan::call($command);
        });

        $this->info("oppak instalation finished");

        $this->call('db:seed');
    }
}
