<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\lib;

use PDO;

//Класс Db
class Db
{

    protected $db;
    //protected $sql;

    public function __construct(){
        $config= require 'application/config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['pass']);
        //debug($config);

        // try {
        //     $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['pass']);
        //     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // } catch (PDOException $e) {
        //     echo 'Подключение не удалось: ' . $e->getMessage();
        // }
    }

    public function query($sql, $params=[]){
        //PDO::prepare — Подготавливает запрос к выполнению и возвращает
        //связанный с этим запросом объект
        $stmt=$this->db->prepare($sql); //'SELECT FROM Users';
        //Проверяем не является ли массив $params пустым
        if(!empty($params)){
            foreach($params as $key=>$val){
                $stmt->bindValue(':'.$key, $val);
                //$stmt->bindParam(':'.$key, $val);
            }
        }
        // $result=$query->fetchColumn();
        // debug($result);
        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params=[]){
        //PDO::query — Выполняет SQL-запрос и возвращает результирующий
        //набор в виде объекта PDOStatement
        $result=$this->query($sql,$params);
        //fetchAll — Возвращает массив, содержащий все строки
        //результирующего набора 
        //
        //PDO::FETCH_ASSOC: возвращает массив, индексированный
        //именами столбцов результирующего набора
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params=[]){
        //PDO::query — Выполняет SQL-запрос и возвращает результирующий
        //набор в виде объекта PDOStatement
        $result=$this->query($sql,$params);
        //fetchColumn — Возвращает данные одного столбца следующей
        //строки результирующего набора
        return $result->fetchColumn();
    }

}