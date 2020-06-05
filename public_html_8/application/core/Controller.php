<?php

//Базовый класс Контроллеров

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

use application\core\View;

//Абстрактный Класс Controller
abstract class Controller
{
    public $route;  //принимает params из Router.php
                    // ['controller'=>'main',
                    //  'action'=>'index'];

    public $view;   // new View(['controller'=>'main', 'action'=>'index'];);

    //Примечание: свойсва $model не было в уроке
    public $model;  // new application\models\Main

    //
    public $acl;  // application/acl

    public function __construct($route)
    {
        //echo '<br>4) Абстрактный Класс <b>Controller</b> вызван<br>';
        $this->route=$route;
        //debug($this->route,__FILE__);
        if(!$this->checkAcl()){
            View::errorCode('403');
            debug($this->checkAcl(),__FILE__);
        }
        $this->view=new View($route);
        $this->model=$this->loadModel($route['controller']);
        //debug($this->model,__FILE__);
                // $route=['controller'=>'main',
                //         'action'=>'index'];
        //debug($this->model,__FILE__);
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

    public function checkAcl(){
        $this->acl=require 'application/acl/'.$this->route['controller'].'.php';
        if($this->isAcl('all')){
            return true;
        }
        elseif(isset($_SESSION['authorize']['id']) and $this->isAcl('authorize')){
            return true;
        }
        elseif(!isset($_SESSION['authorize']['id']) and $this->isAcl('guest')){
            return true;
        }
        elseif(isset($_SESSION['admin']) and $this->isAcl('admin')){
            return true;
        }
        return false;
    }

    public function isAcl($key){
        return in_array($this->route['action'],$this->acl[$key]);
    }
}