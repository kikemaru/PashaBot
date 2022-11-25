<?php

namespace Pavelbot\classes\bot;

class SendMessage
{

    public function __construct()
    {
    }

    public function send($id, $message, $token, $keyboard = 0)
    {
        //Удаление клавы
        if($keyboard == "DEL"){
            $keyboard = array(
                'remove_keyboard' => true
            );
        }

        if($keyboard != 0){
            //Отправка клавиатуры
            $encodedMarkup = json_encode($keyboard);

            $data = array(
                'chat_id'      => $id,
                'parse_mode' => 'html',
                'text'     => $message,
                'reply_markup' => $encodedMarkup
            );

        }else{
            //Отправка сообщения
            $data = array(
                'chat_id'      => $id,
                'parse_mode' => 'html',
                'text'     => $message
            );
        }

        $out = $this->request('sendMessage', $token, $data);
        return $out;
    }


    public function request(string $method, string $token, array $data = array())
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot' . $token .  '/' . $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $out = json_decode(curl_exec($curl), true);

        curl_close($curl);

        return $out;
    }

}