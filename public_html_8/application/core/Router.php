<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

use application\core\View;

//Класс Router
class Router
{
    protected $routes=[];   // ''=>[
                            // 'controller'=>'main',
                            // 'action'=>'index',]

    protected $params=[];   // ['controller'=>'main',
                            //  'action'=>'index'];

    public function __construct()
    {
        //echo '<br>я класс Router ...<br>';
        $arr=require 'application/config/routes.php';
        foreach ($arr as $key=>$val){
            //debug($val,__FILE__);
            $this->add($key, $val);
        }
    }

    public function add($route, $params) //add($key, $val)
    {
        //Приведем значения в переменной $route к виду регулярного выражения
        $routed='#^'.$route.'$#';
        //$routed <-> $key; $params <-> $val
        $this->routes[$routed]=$params;
    }

    public function math()
    {
        //Информация о сервере и среде исполнения $_SERVER
        // Флаг 'REQUEST_URI' - URI, который был предоставлен для доступа к этой странице.
        // $url=$_SERVER['REQUEST_URI'];

        //Удалим из url стоящий с переди слэш "/", с помощью функции trim()
        $url=trim($_SERVER['REQUEST_URI'],'/');
        //debug($url,__FILE__);

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
    //debug($this->routes,__FILE__);
        if($this->math()){
        //Заносим переменную $path формируемый динамически класс. Функция ucfirst() делает заглавным первый символ аргумента
        $path='application\controllers\\'.ucfirst($this->params['controller']).'Controller';
                //echo '<br><br>1) Класс по роуту определен как: '."<b>$path</b>".'<br>';
                //debug($path,__FILE__);
            if(class_exists($path)){
                        //include($path.'.php');
                        //trigger_error("Не удалось загрузить класс: $path", E_USER_WARNING);
                        //echo '<br><br>2) Класс '."<b>$path</b>".' был объявлен<br>';
                $action=$this->params['action'].'Action';
                        //var_dump($action,__FILE__);
                if(method_exists($path,$action)){
                        //echo '<br><br>3) Метод <b>'.$action.'</b> Класса '."<b>$path</b>".' был объявлен<br>';
                        //debug($this->params,__FILE__);

                    //$controller=new application\controllers\MainController($this->params);
                    $controller=new $path($this->params);
                    // $controller->$indexAction();
                    $controller->$action();
                }else{
                    echo '<br><br>Не найден екшен: '."<b>$action</b>";
                    View::errorCode('404');
                }
            }else{
                echo '<br><br>Не найден контроллер: '."<b>$path</b>";
                View::errorCode('404');
            }
        }else{
            echo '<br><br>Маршрут не найден.<br>';
            View::errorCode('604');
        }
    }

}