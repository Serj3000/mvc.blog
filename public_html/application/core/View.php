<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

// Класс View
class View
{
    public $path;
    public $route;
    public $layout='default';

    public function __construct($route)
{
    //echo '<br>Класс <b>View</b> вызван<br>';
    $this->route=$route;
    $this->path=$route['controller'].'/'.$route['action'];
    }

    public function render($title,$vars=[])
    {
        require 'application/views/layouts'.$this->layout.'.php';
    }

}