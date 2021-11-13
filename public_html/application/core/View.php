<?php


namespace application\core;


class View{

    public $path;
    public $route;
    public $layout = 'default';


    public function __construct($route){
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title,$vars = []){

        extract($vars); //"распаковываем" массив в переменные

        $path = 'application/views/' . $this->path . '.php';

        if (file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php'; //подключаем шаблон
        }
    }

    public static function errorCode($code){ //вывод страницы ошибки

        http_response_code($code); //получение кода ошибки
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path; //подключение путь.КОД.php
        }
        exit;

    }

    public function redirect($url){

            header('location:'.$url);
            exit;

    }

}
