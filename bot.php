<?php

require './vendor/autoload.php';
require_once './include/bot.php';
use Pavelbot\Bot;
use Pavelbot\schedule\ScheduleList;
use Pavelbot\logic\Logic;

$logic = new Logic(file_get_contents('php://input'));
$bot = new Bot();
$result = $bot->regUser(array('uid' => '48389284', 'name' => 'Роман' ,'status' => '1'));
echo $result['description']."<br>";

if ($logic->getText() == '/start')
{
    echo 123;
} else {
    botAction($logic->getText());
}

