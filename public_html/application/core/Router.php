<?php

namespace application\core;
class Router
{
    protected $routes = [];

    protected $params = [];

    public function __construct(){

        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params){ //добавляет маршрут
        $route = '#^'.$route.'$#'; //подготовка выражения для preg_match
        $this->routes[$route] = $params;
    }

    public function match(){ //проверяет есть ли такой маршрут

        $url = trim($_SERVER['REQUEST_URI'], '/');

       foreach ($this->routes as $route => $params) {
         if (preg_match($route, $url, $matches)) { //сравнение адресной строки с значениями в массиве с маршрутами(в routes.php)
             $this->params = $params;
                return true;
           }
        }
        return false;
    }

    public function run(){
       if ($this->match()){
           echo 'Маршрут найден';
           exit();
       }
    }
}



