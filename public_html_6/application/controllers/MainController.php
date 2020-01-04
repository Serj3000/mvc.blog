<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {
        echo '<br>5) Главная страница: класс <b>MainController</b> метод <b>indexAction()</b>';
        echo '<br><b>MainController: Главная страница</b><br>';

        $db=new Db;

        $params=[
            'id'=>22,
        ];

        //____________________________________________________________________
        //Вариант 1. Прямой запрос к БД
        //$db->query('SELECT name FROM users WHERE id=1');

        //Вариант 2. Запросы к БД через метод column класса Db
        // $name=$db->column('SELECT name FROM users WHERE id='.$this->id);
        // $ages=$db->column('SELECT age FROM users WHERE id='.$this->id);

        // $vars=[
        //     'name'=>$names,
        //     'age'=>$ages,
        // ];

        // $this->view->render('Главная страница MVC.Blog', $vars);
        //____________________________________________________________________

        $data=$db->column('SELECT name FROM users WHERE id= :id',$params);

        $this->view->render('Главная страница MVC.Blog');
    }

}