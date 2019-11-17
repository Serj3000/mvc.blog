<?php

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