<?php
//Добавил сам , проверь по урокам и восстанови его
namespace application\models;

use application\core\Model;

class Account extends Model
{
    public function loginUser(){
        $result=$this->db->row('SELECT * FROM users');
        //debug($result,__FILE__);
        return $result;
    }
}