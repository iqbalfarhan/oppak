<?php

namespace App\Observers;

use App\Models\Laporan;
use App\Models\Setting;
use App\Traits\TelegramTrait;
use Exception;

class LaporanObserver
{
    use TelegramTrait;
    /**
     * Handle the Laporan "created" event.
     */
    public function created(Laporan $laporan): void
    {
        //
    }

    /**
     * Handle the Laporan "updated" event.
     */
    public function updated(Laporan $laporan): void
    {
        if ($laporan->done) {
            $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_LAPORAN_RUTIN')->first();

            if ($setting && !is_null($setting->value)) {
                $this->setChatId($setting->value);
                $this->setParseMode("markdown");
                $text = $this->generateText("Laporan rutin", $laporan->label);
                try {
                    $this->sendPhoto($laporan->image, $text);
                } catch (Exception $e) {
                    $this->sendMessage($text);
                }
            }
        }
    }

    /**
     * Handle the Laporan "deleted" event.
     */
    public function deleted(Laporan $laporan): void
    {
        //
    }

    /**
     * Handle the Laporan "restored" event.
     */
    public function restored(Laporan $laporan): void
    {
        //
    }

    /**
     * Handle the Laporan "force deleted" event.
     */
    public function forceDeleted(Laporan $laporan): void
    {
        //
    }
}
