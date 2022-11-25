<?php

namespace Pavelbot\logic;
use Pavelbot\classes\bot\SendMessage;
class LogicMessage
{

    public string $token = "";
    public SendMessage $message;

    public function __construct($token)
    {
        $this->token = $token;
        $bot2 = new SendMessage();
        $this->message = $bot2;
    }

    public function responseStart($uid = 0)
    {
        $text = "Добро пожаловать!";
        $keyboard = 'DEL';
        $this->message->send($uid, $text, $this->token, $keyboard);
        //$sendToTelegram = fopen("https://api.telegram.org/bot$this->token/sendMessage?chat_id=893046736&parse_mode=html&text=" . urlencode($text), "r");


    }

    public function responseDefault($uid = 0)
    {
        $bot = $this->message;
        $text = "Не знаю, что ответить!";
        echo $text;
        $keyboard = 'DEL';
        $bot->send($uid, $text, $this->token, $keyboard);
    }

    public function responseSetting($uid)
    {
        $bot = $this->message;
        $text = "Настройки!";
        echo $text;
        $keyboard = 'DEL';
        $bot->send($uid, $text, $this->token, $keyboard);
    }
}