<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        echo '<br>5) Страница входа: класс <b>AccountController</b> метод <b>loginAction()</b>';
    }

    public function registerAction()
    {
        echo '<br>5) Страница регистрации: класс <b>AccountController</b> метод <b>registerAction()</b>';
    }

}