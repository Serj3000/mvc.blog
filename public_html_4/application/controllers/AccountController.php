<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        //Страница входа: класс AccountController  метод loginAction().
        //Используется дефолтный (основной) шаблон представления default.php базовый.
        echo '<br><b>AccountController: Страница входа</b><br>';
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        //Страница регистрации: класс AccountController метод <b>registerAction()
        echo '<br><b>AccountController: Страница регистрации</b><br>';
        // Используется castom (дополнительный) шаблон представления castom.php как базовый.
        $this->view->layout='custom';
        $this->view->render('Регистрация');
    }
}