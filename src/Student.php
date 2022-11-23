<?php

namespace Pavelbot;
use PDO;
use Pavelbot\Result;
class Student
{

    /**
     * @var PDO экземпляр класса PDO
     */
    private PDO $db;

    /**
     * @var int
     * Группа по лабам
     */
    public int $userGroup;


    public function __construct()
    {
        $db = new Db();
        $this->db = $db->getDb();
    }


    /**
     * @return \int[][]
     * Метод возвращающий список возможных пользователей
     */
    public function getStudent(): array
    {
        return array(
            'Роман' => array('eng' => 2, 'lab' => 2)
        );
    }

    /**
     * @param array $regData
     * @return array
     * Метод для регистрации нового пользователя
     */
    public function regUser(array $regData): array
    {
        if ($this->checkUser($regData['name']))
        { if ($this->checkRegUser($regData['name']))
            { if($this->successReg($regData['uid'], $regData['name'], $regData['status'])){
                return Result::setResult('200', 'Аккаунт успешно зарегистрирован!');} else {
                return Result::setResult('500', 'Ошибка при регистрации аккаунта!');
            } } else { return Result::setResult('200', 'Данный студент уже имеет учетную запись!');
            } } else { return Result::setResult('200', 'Такого студента нет в группе!');
        }
    }


    /**
     * @param $name
     * @return bool
     * Метод проверки, есть ли регистрируемый пользователь среди возможных
     */
    public function checkUser($name): bool
    {
        $getStudent = $this->getStudent();
        if (!empty($getStudent[$name])){
            return true;
        } else { return false; }
    }


    /**
     * @param $name
     * @return bool
     * Метод проверки, есть ли регистрируемый пользователь в системе
     */
    public function checkRegUser($name): bool
    {
        $db = $this->db;
        $rs = $db->query("SELECT * FROM users WHERE name = '$name'")->fetch();
        if (empty($rs['uid']))
        { return true; } else { return false; }
    }


    /**
     * @param string $uid
     * @param string $name
     * @param int $status
     * @return bool
     * Метод добавляющий пользователя в систему (бд)
     */
    public function successReg(string $uid, string $name, int $status): bool
    {
        $db = $this->db;
        $set = $db->query("INSERT INTO users (`uid`, `name`, `status`) VALUES ('$uid', '$name', '$status')");
        if ($set){ return true; } else { return false; }
    }


    /**
     * @param $name
     * @return int
     * Метод возвращающий номер подгруппы
     */
    public function getNumberGroup($name): int
    {
        $result = $this->getStudent();
        foreach ($result as $student => $items)
        { if ($student == $name) {
                foreach ($items as $key => $value) {
                    if ($key == 'lab') {
                        $this->userGroup = $value;
                    }}}}
        return $this->userGroup;
    }


}