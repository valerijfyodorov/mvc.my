<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller {

    public function indexAction(){
        $db = new Db;

        /*$params = [ //параметры для sql запроса
            'id'=>1,
        ];
        //$data =  $db->column('SELECT name FROM users WHERE id =2'); //обычный небезопасный для sql инъекций
        $data =  $db->column('SELECT name FROM users WHERE id = :id', $params); // подготовленный sql запрос

        debug($data);*/
        $this->view->render('Главная страница');

    }

}