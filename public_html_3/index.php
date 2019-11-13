<?php

//Подключения метода debug() из файла Dev.php
require 'application/lib/Dev.php';
// $arr=[1,2,3,4];
// debug($arr);


//Используем класс Router
use application\core\Router;
use application\lib\Db;


//Реализация метода автозагрузки классов

//Способ #1 Реализации метода автозагрузки-----
    // spl_autoload_register(function($class){
    //     $path=str_replace('\\','/',$class.'.php');
    //     echo $path;
    //     if(file_exists($path)) {
    //         require $path;
    //     }
    // });
//---------------------------------------------


//Способ #2 Реализации метода автозагрузки-----
    function my_autoloader($class) {
        include ''. $class . '.php';
    }
    spl_autoload_register('my_autoloader');
//---------------------------------------------

//Запускаем сессию
//session_start();

$routing=new Router;
$routing->run();

//$routing=new Db;