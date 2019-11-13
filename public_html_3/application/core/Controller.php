<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

//Абстрактный Класс Controller
abstract class Controller
{
    public function __construct()
    {
        echo '<br>4) Абстрактный Класс <b>Controller</b> вызван<br>';
    }

}