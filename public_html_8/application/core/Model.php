<?php
// Базовый абстрактный класс Моделей, который наследуют все модели

namespace application\core;

use application\lib\Db;

abstract class Model
{
    public $db;

    public function __construct()
    {
        $this->db=new Db;
    }
}