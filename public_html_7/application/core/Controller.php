<?php

//Базовый класс Контроллеров

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

//Абстрактный Класс Controller
abstract class Controller
{
    public $route;  //принимает params из Router.php
                    // ['controller'=>'main',
                    //  'action'=>'index'];

    public $view;   // new View(['controller'=>'main', 'action'=>'index'];);

    //Примечание: свойсва $model не было в уроке
    public $model;  // new application\models\Main

    public function __construct($route)
    {
        //echo '<br>4) Абстрактный Класс <b>Controller</b> вызван<br>';
        $this->route=$route;
        //debug($this->route,__FILE__);
        $this->view=new View($route);
        $this->model=$this->loadModel($route['controller']);
        //debug($this->model,__FILE__);
                // $route=['controller'=>'main',
                //         'action'=>'index'];
        debug($this->model,__FILE__);
    }

    //Метод для вызова класса модели c именем указанным в переменной $name
    public function loadModel($name)
    {
        //$path='application\models\Main';
        $path='application\models\\'.ucfirst($name);
        //debug($path,__FILE__);
        if(class_exists($path)){
            // return new application\models\Main
            return new $path;
        }
    }
}