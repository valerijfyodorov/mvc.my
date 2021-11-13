<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller {

    public function indexAction(){
        $db = new Db;

        $form = 2;

        $data =  $db->column('SELECT name FROM users WHERE id ='.$form);

        debug($data);
        $this->view->render('Главная страница');

    }

}