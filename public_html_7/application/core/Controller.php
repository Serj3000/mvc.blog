<?php

//Базовый класс Контроллеров

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

//Абстрактный Класс Controller
abstract class Controller
{
    public $route;
    public $view;

    //Примечание: свойсва $model не было в уроке
    public $model;

    public function __construct($route)
    {
        //echo '<br>4) Абстрактный Класс <b>Controller</b> вызван<br>';
        $this->route=$route;
        $this->view=new View($route);
        $this->model=$this->loadModel($route['controller']);
    }

    //Метод для вызова класса модели c именем указанным в переменной $name
    public function loadModel($name)
    {
        $path='application\models\\'.ucfirst($name);
        if(class_exists($path)){
            return new $path;
        }

    }

}