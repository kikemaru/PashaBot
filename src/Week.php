<?php


namespace Pavelbot;

class Week
{
    public function __construct()
    {

    }

    /**
     * @return int
     * Метод определяющий четность недели
     */
    public function getTypeWeek(): int
    {
        $week = date("W");
        if($week%2 === 0) {
            return $type_week = 2; //четная
        } else {
            return $type_week = 1; //нечетная
        }
    }

    /**
     * @return false|string
     * Метод определяющий номер дня в неделе
     */
    public function getNumDay()
    {
         return $today = date("N");
    }

    /**
     * @return false|string
     * Метод определяющий сегодняшнюю дату
     */
    public function getDate()
    {
        return $date = date("d.m.y");
    }

    /**
     * @param $code
     * @return string
     * Метод переводящий тип недели в текстовый формат
     */
    public function getTextWeekType($code): string
    {
        if ($code == 1) {
            return "нечетная";
        } elseif($code == 2){
            return "четная";
        } else {
            return "empty";
        }
    }


    /**
     * @return false|string
     * Метод для определеня текущих дня и месяца
     */
    public function getDateDM()
    {
        return $date = date("d.m");
    }
}