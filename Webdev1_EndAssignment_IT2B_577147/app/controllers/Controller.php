<?php
namespace controllers;

class Controller
{
    //TODO: Research into the controller class read: chatgpt tips text doc
    function displayView($model){
        $directory = substr(get_class($this), 0, -10);
        $view = debug_backtrace()[1]['function'];
        require __DIR__ . "/../views/$directory/$view.php";
    }
}