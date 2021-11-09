<?php
ini_set('display_errors',1); //вывод ошибок на экран
error_reporting(E_ALL); //отчет об ошибках(все ошибки и варнинги)
function debug($str){
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
    exit();
}