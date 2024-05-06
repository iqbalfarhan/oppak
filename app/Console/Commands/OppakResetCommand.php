<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
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
            "db:seed RoleSeeder",
            "db:seed PermissionSeeder",
            "db:seed UserSeeder",
            "db:seed SettingSeeder",
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
