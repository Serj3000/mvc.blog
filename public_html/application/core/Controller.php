<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

//Абстрактный Класс Controller
abstract class Controller
{
    public $route;
    public $view;

    public function __construct($route)
    {
        //echo '<br>4) Абстрактный Класс <b>Controller</b> вызван<br>';
        $this->route=$route;
        $this->view=new View($route);
    }

}