<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        //echo '<br>5) Главная страница: класс <b>MainController</b> метод <b>indexAction()</b>';
        //echo '<br><b>MainController: Главная страница</b><br>';
        
        $vars=[
            'name'=>'Вася',
            'age'=>90,
        ];

        $this->view->render('Главная страница title', $vars);
    }

}