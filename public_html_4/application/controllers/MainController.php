<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        //echo '<br>Главная страница: класс MainController метод indexAction()';
        //Обращение к методу render() класса View через свойство view наследуемого класса Controller
        $this->view->render('Текст на вкладке title');
    }
}