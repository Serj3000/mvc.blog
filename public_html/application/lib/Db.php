<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\lib;

use PDO;

//Класс Router
class Db
{

    protected $db;

    public function __construct()
    {

        $config= require_once 'application/config/db.php';
        //$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['pass']);

        try {
            $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['pass']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }

    }

}