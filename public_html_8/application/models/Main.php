<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getNews()
    {
        //echo 'Модель Main метод getNews() работает'
        $result=$this->db->row('SELECT title, description FROM news');
        return $result;
    }
}