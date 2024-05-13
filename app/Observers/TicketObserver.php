<?php

namespace App\Observers;

use App\Models\Setting;
use App\Models\Ticket;
use App\Traits\TelegramTrait;
use Exception;

class TicketObserver
{
    use TelegramTrait;

    public function created(Ticket $ticket): void
    {
        $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_TICKETING')->first();

        if ($setting && !is_null($setting->value)) {
            $this->setChatId($setting->value);
            $this->setParseMode("markdown");
            $text = $this->generateText("Ticket dibuat", $ticket->label);
            try {
                $this->sendPhoto($ticket->image, $text);
            } catch (Exception $e) {
                $this->sendMessage($text);
            }
        }
    }

    public function updated(Ticket $ticket): void
    {
        if ($ticket->done) {
            $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_TICKETING')->first();

            if ($setting && !is_null($setting->value)) {
                $this->setChatId($setting->value);
                $this->setParseMode("markdown");
                $text = $this->generateText("Ticket berhasil diclose", $ticket->label);
                try {
                    $this->sendPhoto($ticket->image, $text);
                } catch (Exception $e) {
                    $this->sendMessage($text);
                }
            }
        }
        elseif ($ticket->pengajuan) {
            $setting = Setting::where('key', 'TELEGRAM_GROUP_ID_TICKETING')->first();

            if ($setting && !is_null($setting->value)) {
                $this->setChatId($setting->value);
                $this->setParseMode("markdown");
                $text = $this->generateText("Request close ticket", $ticket->label);
                try {
                    $this->sendPhoto($ticket->image, $text);
                } catch (Exception $e) {
                    $this->sendMessage($text);
                }
            }
        }
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
