<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller
{
    public function indexAction()
    {
        $result=$this->model->getNews();
        $var=[
            'news_MainController'=>$result,
        ];
        //debug($result);

        // $db=new Db;
        // $params=[
        //     'id'=>22,
        //      ];
        // $data=$db->column('SELECT name FROM users WHERE id= :id',$params);
        
        $this->view->render('Главная страница MVC.Blog',$var);
    }

}