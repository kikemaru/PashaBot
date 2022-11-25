<?php

/**
 * Автор github: kikemaru
 */
namespace Pavelbot;
use Pavelbot\logic\Logic;
use Pavelbot\Week;
use Pavelbot\Student;
use PDO;
class Bot
{


    /**
     * @var string
     * ключ api чат-бота
     */
    public string $token = "5710738680:AAGwEhq1y4f4VyF5dFK8O_j_LptRgrUtsno";

    /**
     * @var PDO
     * Подключение к бд
     */
    private PDO $db;

    /**
     * @var int
     * Тип недели (1 - нечет, 2 - чет)
     */
    public int $type_week = 0;

    /**
     * @var int
     * Номер дня в текущей неделе
     */
    public int $num_day = 0;

    /**
     * @var string
     * Сегодняшняя дата
     */
    public string $date = "01.01.2001";

    /**
     * @var array
     * Массив со студентами группы, которые могут создать аккаунт
     */
    public array $students = [];

    /**
     * @var Week экземпляр класса Week
     */
    private Week $weekClass;

    /**
     * @var Student экземпляр класса Student
     */
    private Student $studentClass;



    public function __construct($body = 0)
    {
        $week = new Week();
        $this->weekClass = $week;
        $student = new Student();
        $this->studentClass = $student;
        $db = new Db();
        $this->type_week = $week->getTypeWeek();
        $this->num_day = $week->getNumDay();
        $this->date = $week->getDate();
        $this->db = $db->getDb();
        $this->students = $student->getStudent();
        $logic = new Logic($body, $this->token);
    }


    /**
     * @param array $regData
     * @return array
     * Метод для регистрации пользователя
     */
    public function regUser(array $regData): array
    {
        $student = $this->studentClass;
        return $student->regUser($regData);
    }

    public function getToken(): string
    {
        return $this->token;
    }
    




}