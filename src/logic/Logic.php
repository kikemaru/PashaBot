<?php

namespace Pavelbot\logic;
use Pavelbot\logic\LogicMessage;
class Logic
{


    public string $chat_id = "0";
    public string $userTgId = "";
    public string $text = "";
    public string $user_name = "";

public function __construct($body, $token)
{
    $arr = json_decode($body, true);
    $this->chat_id = $arr['message']['chat']['id']; //id чата
    $this->userTgId = $arr['message']['from']['id']; //id пользователя
    $this->text = $arr['message']['text']; //Сообщение
    $this->user_name = $arr['message']['from']['first_name']; //Имя пользователя
    $this->response($token);
//
//    $fp = fopen("test.txt", "a+");
//    fwrite($fp, $body);
}

    /**
     * Метод возврата сообщения
     */
public function getText()
{
    return $this->text;
}

public function response($token)
{
    $text = $this->text;
    $logic = new LogicMessage($token);
    $uid = $this->chat_id;

    switch ($text)
    {
        case "/start": $logic->responseStart($uid); break;
        case "settings": $logic->responseSetting($uid); break;
        default: $logic->responseDefault($uid);
    }

}


}