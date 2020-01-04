<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

//Класс Router
class Router
{
    protected $routes=[];
    protected $params=[];

    public function __construct()
    {
        echo '<br>я класс Router ...<br>';
        $arr=require 'application/config/routes.php';
        foreach ($arr as $key=>$val){
            $this->add($key, $val);
        }
    //debug($this->routes);
    }

    public function add($route, $params)
    {
        //Приведем значения в переменной $route к виду регулярного выражения
        $route='#^'.$route.'$#';
        // echo "<br>'#^'.\$route.'$#' =".$route.'<br>';
        // echo '<br>$params = ';
        // var_dump($params);
        // echo '<br><br><br>';
        $this->routes[$route]=$params;
        //debug($this->routes);
    }

    public function math()
    {
        //Информация о сервере и среде исполнения $_SERVER
        // Флаг 'REQUEST_URI' - URI, который был предоставлен для доступа к этой странице.
        // $url=$_SERVER['REQUEST_URI'];

        //Удалим из url стоящий с переди слэш "/", с помощью функции trim()
        $url=trim($_SERVER['REQUEST_URI'],'/');
        //debug($url);

        //В цикле перебираем массив маршрутов
        foreach($this->routes as $route=>$params){

            //Выполняем проверку на соответствие регулярному выражению, с помощью функции preg_match(), параметров $route,$url
            //В случае, если указан дополнительный параметр matches, он будет заполнен результатами поиска.
            if(preg_match($route,$url,$matches)){
                $this->params=$params;
                // echo '<br>$route true ...<br>'.$route;
                // echo '<br>$url true ...<br>'.$url;
                // echo '<br>$matches true ...<br>';
                // var_dump($matches);
                // echo '<br>math true ...<br>';
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if($this->math()){
        //debug($this->params);
            $path='application\controllers\\'.ucfirst($this->params['controller']).'Controller';
            echo '<br>$path= '.$path.'<br>';
            //Выражение include включает и выполняет указанный файл
            include($path . '.php');
            //Проверяет, был ли объявлен класс
            if(class_exists($path)){
                echo '<br>ОК<br>';
            }else{
            echo '<br>Не найден: '.$path.'<br>';
            }
        }else{
        echo '<br>Маршрут не найден ...<br>';
        }
    }

}