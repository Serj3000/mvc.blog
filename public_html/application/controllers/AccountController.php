<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        //echo '<br>5) Страница входа: класс <b>AccountController</b> метод <b>loginAction()</b>';
        echo '<br><b>AccountController: Страница входа</b><br>';
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        //echo '<br>5) Страница регистрации: класс <b>AccountController</b> метод <b>registerAction()</b>';
        echo '<br><b>AccountController: Страница регистрации</b><br>';
        $this->view->layout='custom';
        $this->view->render('Регистрация');
    }

}