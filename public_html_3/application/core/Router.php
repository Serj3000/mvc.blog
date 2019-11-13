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
        //echo '<br>я класс Router ...<br>';
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
        $this->routes[$route]=$params;
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
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if($this->math()){
        //Заносим переменную $path формируемый динамически класс. Функция ucfirst() делает заглавным первый символ аргумента
        $path='application\controllers\\'.ucfirst($this->params['controller']).'Controller';
        echo '<br><br>1) Класс по роуту определен как: '."<b>$path</b>".'<br>';
        //debug($path);
            if(class_exists($path)){
                    //include($path.'.php');
                   //trigger_error("Не удалось загрузить класс: $path", E_USER_WARNING);
                echo '<br><br>2) Класс '."<b>$path</b>".' был объявлен<br>';
                $action=$this->params['action'].'Action';
                //var_dump($action);
                if(method_exists($path,$action)){
                    echo '<br><br>3) Метод <b>'.$action.'</b> Класса '."<b>$path</b>".' был объявлен<br>';
                    //debug($path);
                    $controller=new $path($this->params);
                    $controller->$action();
                }else{
                    echo '<br><br>4) Не найден екшен: '."<b>$action</b>";
                }
            }else{
                echo '<br><br>5) Не найден контроллер: '."<b>$path</b>";
            }
        }else{
            echo '<br><br>6) Маршрут не найден.<br>';
        }
    }

}