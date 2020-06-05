<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction(){
        if(!empty($_POST)){
            //exit(json_encode(['status'=>'success','message'=>123]));
            //$this->view->message('error','Код ошибки');
            $this->view->location("/account/register");
        }
        
        //echo '<br>5) Страница входа: класс <b>AccountController</b> метод <b>loginAction()</b>';
        echo '<br><b>AccountController: Страница входа</b><br>';
        $result=$this->model->loginUser();
        $vars=['login_AccountController'=>$result];
        $this->view->render('Вход',$vars);
    }

    public function registerAction(){
        //echo '<br>5) Страница регистрации: класс <b>AccountController</b> метод <b>registerAction()</b>';
        echo '<br><b>AccountController: Страница регистрации</b><br>';
        $this->view->layout='custom';
        $this->view->render('Регистрация');
    }

//------------------------------------------------------------

    // public function loginAction(){

    //     $result=$this->model->loginUser();
    //     //debug($result,__FILE__);
    //     $vars=['login_AccountController'=>$result];
    //     //debug($result);

    //     $this->view->render('Главная страница MVC.Blog',$vars);
    // }

}