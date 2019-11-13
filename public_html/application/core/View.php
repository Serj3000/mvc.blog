<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

//Абстрактный Класс Controller
class View
{
    public $path;
    public $layout='default';

    public function __construct()
    {
        echo '<br> Класс <b>View</b> вызван<br>';
        //$this->route=$route;
    }

}