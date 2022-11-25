<?php

require './vendor/autoload.php';
require_once './include/bot.php';

$bot = new Pavelbot\Bot(file_get_contents('php://input'));



