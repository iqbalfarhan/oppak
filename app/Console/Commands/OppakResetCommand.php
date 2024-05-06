<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Laravel\Prompts\Output\ConsoleOutput;

class OppakResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oppak:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset data oppak';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $artisantorun = [
            "migrate:fresh",
            "db:seed",
            "oppak:reset-storage"
        ];

        $this->withProgressBar($artisantorun, function($command){
            Artisan::call($command);
        });

        $this->newLine();
    }
}
