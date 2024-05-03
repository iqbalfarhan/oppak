<?php

namespace App\Observers;

use App\Models\Setting;
use App\Models\Ticket;
use App\Traits\TelegramTrait;
use Illuminate\Support\Facades\Storage;

class TicketObserver
{
    use TelegramTrait;

    public function created(Ticket $ticket): void
    {
        $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_TICKETING')->first();
        if ($setting) {
            $this->setChatId($setting->value);
            $this->setParseMode("markdown");
            $text = $this->generateText("Ticket dibuat", $ticket->label);
            if ($ticket->photo) {
                $this->sendPhoto($ticket->image, $text);
            }
            else{
                $this->sendMessage($text);
            }
        }
    }

    public function updated(Ticket $ticket): void
    {
        //
    }

    public function deleted(Ticket $ticket): void
    {
        //
    }

    public function restored(Ticket $ticket): void
    {
        //
    }

    public function forceDeleted(Ticket $ticket): void
    {
        //
    }
}
