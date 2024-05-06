<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
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
            "migrate:fresh",
            "db:seed",
            "key:generate",
            "storage:link",
        ];

        $output = new ConsoleOutput();

        $spinner = ['⠋', '⠙', '⠹', '⠸', '⠼', '⠴', '⠦', '⠧', '⠇', '⠏'];
        $index = 0;

        foreach ($artisantorun as $command) {
            $output->write("\r" . $spinner[$index % count($spinner)] . ' Running ' . $command . ' command...    ');
            Artisan::call($command);
            $index++;
        }

        $output->write("\r" . '✔️ All commands completed successfully!' . "\n");
    }
}
