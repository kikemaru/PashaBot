<?php

namespace Pavelbot;
class Result
{

    /**
     * @param $code
     * @param $description
     * @return array
     * Метод возвращающий массив результата запросов
     */
     public static function setResult($code, $description): array
    {
        return array('code' => $code, 'description' => $description);
    }
}