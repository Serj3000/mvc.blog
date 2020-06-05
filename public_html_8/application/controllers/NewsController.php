<?php

namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller
{
    public function showAction()
    {
        //echo '<br>5) Страница новостей: класс <b>NewController</b> метод <b>showAction()</b>';
        echo '<br><b>NewsController: Страница новостей</b><br>';

        $result=$this->model->getNews();
        //debug($result,__FILE__);
        $vars=['news_NewsController'=>$result];
        //debug($result);

        // $db=new Db;
        // $params=[
        //     'id'=>22,
        //      ];
        // $data=$db->column('SELECT name FROM users WHERE id= :id',$params);
        
        $this->view->render('Главная страница MVC.Blog',$vars);
    }

}