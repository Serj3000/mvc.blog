<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
    protected $id=6;

    public function indexAction()
    {
        echo '<br>5) Главная страница: класс <b>MainController</b> метод <b>indexAction()</b>';
        echo '<br><b>MainController: Главная страница</b><br>';

        $db=new Db;
        //$db->query('SELECT name FROM users WHERE id=1');
        $names=$db->column('SELECT name FROM users WHERE id='.$this->id);
        $ages=$db->column('SELECT age FROM users WHERE id='.$this->id);

        //$this->view->render('Главная страница MVC.Blog');

        $vars=[
            'name'=>$names,
            'age'=>$ages,
        ];
        //debug($vars);
        $this->view->render('Главная страница MVC.Blog', $vars);
    }

}