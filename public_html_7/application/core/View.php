<?php

//Пространчво имен, определяющее расположение файла класса
namespace application\core;

// Класс View
class View
{
    public $path;   //  main/index

    public $route;  // $route=['controller'=>'main',
                    //         'action'=>'index'];

    public $layout='default';




    public function __construct($route)
{
    //echo '<br>Класс <b>View</b> вызван<br>';
    $this->route=$route;
    //debug($this->route,__FILE__);
    $this->path=$route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars=[])
    {
        //Импортируем переменные из массива $vars в текущую таблицу символов
        extract($vars);
        debug($vars,__FILE__);
        $path='application/views/'.$this->path.'.php';
        if(file_exists($path)) {
            //ob_start — Включение буферизации вывода
            ob_start();
            //debug('application/views/'.$this->path.'.php',__FILE__);
            //"application/views/main/index.php"
            require 'application/views/'.$this->path.'.php';
            //ob_get_clean — Получить содержимое текущего буфера и удалить его
            $content=ob_get_clean();
            require 'application/views/layouts/'.$this->layout.'.php';
        }else{
            echo '<br>Вид <b>'.$this->path.'</b> не найден<br>';
        }
    }

    public function redirect($url)
    {
        //Отправка HTTP-заголовка.
        //Cпециальным видом заголовков является "Location:". В этом случае
        //функция не только отправляет этот заголовок браузеру,
        //но также возвращает ему код состояния REDIRECT (302)
        header('location: '.$url);
        exit;
    }

    public static function errorCode($code)
    {
        //Получает или устанавливает код ответа HTTP
        http_response_code($code);
        $path='application/views/errors/'.$code.'.php';
        if(file_exists($path)){
        require $path;
        };
        exit;
    }

    public function message($status, $message){
        exit(json_encode(['status'=>$status,'message'=>$message]));
    }

    public function location($url){
        exit(json_encode(['url'=>$url]));
    }

}