<?php

namespace Pavelbot\schedule;
use Pavelbot\Student;
use Pavelbot\Week;
class ScheduleList
{
    /**
     * @var string
     * Имя студента
     */
    private string $name = "";

    /**
     * @var Student
     * Экземпляр класса Student
     */
    private Student $student;

    /**
     * @var array
     * Расписание занятий
     */
    private array $scheduleList = [];

    /**
     * @var array
     * Даты расписания лаб
     */
    private array $date = [];

    /**
     * @var int
     * Группа по лабам
     */
    public int $groupLab;

    private Week $week;

    private string $toDayDM = '';


    public function __construct($name)
    {
        $this->name = $name;
        $this->student = new Student();
        $this->setScheduleList();
        $this->setScheduleListDate();
        $this->setUserGroup($name);
        $this->generatePersonalSchedule($this->groupLab);
        $this->week = new Week();
        $this->getToDayDM();
    }

    /**
     * @return void
     * Получение текущего дня и месяца
     */
    public function getToDayDM()
    {
        $week = $this->week;
        $this->toDayDM = $week->getDateDM();
    }

    /**
     * @return void
     * Метод для формирования расписания
     */
    public function setScheduleList()
    {
        $scheduleList = [];
        include_once './include/ScheduleList.php';
        $this->scheduleList = $scheduleList;
    }

    /**
     * @return void
     * Метод для формирования дат для расписания
     */
    public function setScheduleListDate()
    {
        $scheduleDate = [];
        include_once './include/ScheduleDate.php';
        $this->date = $scheduleDate;
    }


    /**
     * @param $name
     * @return void
     * Метод для получения подгруппы студента
     */
    public function setUserGroup($name)
    {
        $student = $this->student;
        $this->groupLab = $student->getNumberGroup($name);
    }


    /**
     * @param $group
     * @return void
     * Метод, создающий расписание по подгруппе
     */
    private function generatePersonalSchedule($group)
    {
        $date = $this->date;
        if ($date[0] == 1)
        {
            if($date[1] == $this->toDayDM)
            {

            }
        }
    }


}