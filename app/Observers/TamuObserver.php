<?php

namespace App\Observers;

use App\Models\Setting;
use App\Models\Tamu;
use App\Traits\TelegramTrait;
use Illuminate\Support\Facades\Storage;

class TamuObserver
{
    use TelegramTrait;

    public function created(Tamu $tamu): void
    {
        $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_BUKU_TAMU')->first();
        if ($setting) {
            $this->setChatId($setting->value);
            $this->setParseMode("markdown");

            $message = $this->generateText("Input tamu baru", $tamu->label);
            $this->sendMessage((string)$message);
        }
    }

    public function updated(Tamu $tamu): void
    {
        //
    }

    public function deleted(Tamu $tamu): void
    {
        foreach ($tamu->images as $image) {
            Storage::delete($image);
        }
    }

    public function restored(Tamu $tamu): void
    {
        //
    }

    public function forceDeleted(Tamu $tamu): void
    {
        //
    }
}
