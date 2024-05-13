<?php

namespace App\Observers;

use App\Models\Insidensial;
use App\Models\Setting;
use App\Traits\TelegramTrait;
use Exception;

class InsidensialObserver
{
    use TelegramTrait;
    /**
     * Handle the Insidensial "created" event.
     */
    public function created(Insidensial $insidensial): void
    {
        $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_INSIDENSIAL')->first();

        if ($setting && !is_null($setting->value)) {
            $this->setChatId($setting->value);
            $this->setParseMode("markdown");
            $text = $this->generateText("Laporan insidensial", $insidensial->label);
            try {
                $this->sendPhoto($insidensial->image, $text);
            } catch (Exception $e) {
                $this->sendMessage($text);
            }
        }
    }

    /**
     * Handle the Insidensial "updated" event.
     */
    public function updated(Insidensial $insidensial): void
    {
        //
    }

    /**
     * Handle the Insidensial "deleted" event.
     */
    public function deleted(Insidensial $insidensial): void
    {
        //
    }

    /**
     * Handle the Insidensial "restored" event.
     */
    public function restored(Insidensial $insidensial): void
    {
        //
    }

    /**
     * Handle the Insidensial "force deleted" event.
     */
    public function forceDeleted(Insidensial $insidensial): void
    {
        //
    }
}
