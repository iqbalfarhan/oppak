<?php

namespace App\Console\Commands;

use App\Models\Pergantian;
use App\Models\Setting;
use App\Traits\TelegramTrait;
use Exception;
use Illuminate\Console\Command;

class OppakReminderPergantianCommand extends Command
{
    use TelegramTrait;

    protected $signature = 'oppak:reminder-pergantian';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $botToken = Setting::where('key', 'TELEGRAM_BOT_TOKEN')->first();
        $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_PERGANTIAN_RUTIN')->first();

        if ($botToken && $setting && !is_null($setting->value)) {

            $pergantian = Pergantian::get()->filter(function($pergantian) {
                return $pergantian->next_action->format('Y-m-d') == date('Y-m-d');
            })->groupBy(function($item) {
                return $item->site->label;
            })->map(function($data){
                $perangakats = [];
                foreach($data as $pg)
                {
                    $perangakats[] = $pg->perangkat->name;
                }
                return implode(", ", $perangakats);
            });

            $pesan = [];
            foreach ($pergantian as $key => $value) {
                $pesan[] = $key." => ".$value;
            }

            $this->setBotToken($botToken->value);
            $this->setChatId($setting->value);
            $this->setParseMode("markdown");

            $text = $this->generateText("Reminder pergantian rutin hari ini", implode("\n", $pesan));

            try {
                $this->sendMessage($text);
            } catch (Exception $e) {
                $this->sendMessage($e->getMessage());
            }
        }

        return 0;
    }
}
