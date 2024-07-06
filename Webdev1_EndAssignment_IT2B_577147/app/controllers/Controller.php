<?php
namespace Controllers;

class Controller
{
    function displayView(){
        $directory = substr(get_class($this), 0, -10);
        $view = debug_backtrace()[1]['function'];
        require __DIR__ . "/../views/$directory/$view.php";
    }

    function errorHandler($code, $message){
            $_GET['p'] = $code;
            $_GET['i'] = $message;
            $_SERVER['REQUEST_URI'] = '/error/';
            \Router::getInstance()->handleRequest();
    }
}