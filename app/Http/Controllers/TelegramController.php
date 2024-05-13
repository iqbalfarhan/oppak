<?php

namespace App\Http\Controllers;

use App\Traits\TelegramTrait;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    use TelegramTrait;

    public function index()
    {
        $req = json_decode(file_get_contents("php://input"), TRUE);
        $chat_id = $req['message']['chat']['id'];
        $this->setChatId($chat_id);
        return $this->sendMessage("silakan ini dia Telegram ID kamu <b>{$chat_id}</b>");
    }
}
