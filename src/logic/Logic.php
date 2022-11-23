<?php

namespace Pavelbot\logic;
class Logic
{


    public string $chat_id = "";
    public string $userTgId = "";
    public string $text = "";
    public string $user_name = "";

public function __construct($body)
{
    $arr = json_decode($body, true);
    $this->chat_id = $arr['message']['chat']['id']; //id чата
    $this->userTgId = $arr['message']['from']['id']; //id пользователя
    $this->text = $arr['message']['text']; //Сообщение
    $this->user_name = $arr['message']['from']['first_name']; //Имя пользователя
}

    /**
     * @return string
     * Метод возврата сообщения
     */
public function getText(): string
{
    return $this->text;
}


}