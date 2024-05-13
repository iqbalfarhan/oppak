<?php

namespace App\Observers;

use App\Models\Pergantian;
use App\Models\Setting;
use App\Traits\TelegramTrait;
use Exception;

class PergantianObserver
{
    use TelegramTrait;
    /**
     * Handle the Pergantian "created" event.
     */
    public function created(Pergantian $pergantian): void
    {
        $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_PERGANTIAN_RUTIN')->first();

        if ($setting && !is_null($setting->value)) {
            $this->setChatId($setting->value);
            $this->setParseMode("markdown");
            $text = $this->generateText("Pergantian rutin", $pergantian->label);
            try {
                $this->sendPhoto($pergantian->image, $text);
            } catch (Exception $e) {
                $this->sendMessage($text);
            }
        }
    }

    /**
     * Handle the Pergantian "updated" event.
     */
    public function updated(Pergantian $pergantian): void
    {
        //
    }

    /**
     * Handle the Pergantian "deleted" event.
     */
    public function deleted(Pergantian $pergantian): void
    {
        //
    }

    /**
     * Handle the Pergantian "restored" event.
     */
    public function restored(Pergantian $pergantian): void
    {
        //
    }

    /**
     * Handle the Pergantian "force deleted" event.
     */
    public function forceDeleted(Pergantian $pergantian): void
    {
        //
    }
}
