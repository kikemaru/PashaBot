<?php

namespace Pavelbot;
use PDO;
class Db
{
    /**
     * @var PDO
     * Экземпляр класса PDO
     */
    public PDO $db;

    public function __construct()
    {
        /**
         * Подключение к базе данных
         */
        $this->db = new PDO('mysql:host=localhost;dbname=имя_бд;', 'имя_пользователя', 'пароль');
    }


    /**
     * @return PDO
     * Метод возвращающий экземпляр класса PDO с подключением к бд
     */
    public function getDb(): PDO
    {
        return $this->db;
    }
}