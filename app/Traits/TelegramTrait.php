<?php

namespace App\Traits;
use App\Models\Setting;
use GuzzleHttp\Client;

trait TelegramTrait
{
    protected $chatId;
    protected $parseMode = "markdown";
    protected $botToken;

    public function __construct()
    {
        $this->botToken = $this->getBotTokenFromDatabase();
    }

    public function generateText($title, $content): String
    {
        return implode("\n\n", [
            "*{$title}*",
            $content
        ]);
    }

    public function setBotToken($botToken){
        $this->botToken = $botToken;
    }

    public function setChatId($chatId)
    {
        $this->chatId = $chatId;
    }

    public function setParseMode($parseMode)
    {
        $this->parseMode = $parseMode;
    }

    public function sendMessage($text)
    {
        $client = new Client();
        $response = $client->post(
            'https://api.telegram.org/bot' . $this->botToken . '/sendMessage',
            [
                'json' => [
                    'chat_id' => $this->chatId,
                    'text' => $text,
                    'parse_mode' => $this->parseMode
                ]
            ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    public function sendPhoto($photoUrl, $caption = "")
    {
        $client = new Client();
        $response = $client->post(
            'https://api.telegram.org/bot' . $this->botToken . '/sendPhoto',
            [
                'form_params' => [
                    'chat_id' => $this->chatId,
                    'photo' => $photoUrl,
                    'caption' => $caption
                ]
            ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    protected function getBotTokenFromDatabase():String
    {
        return Setting::where('key', 'TELEGRAM_BOT_TOKEN')->first()->value;
    }
}
