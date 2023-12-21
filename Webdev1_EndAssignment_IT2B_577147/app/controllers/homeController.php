<?php
namespace controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
class homeController extends Controller
{
    public function index(){
        require __DIR__ . '/../views/home/index.php';
        if(!isset($_SESSION['user_id'])){
            $_SESSION['visitor_id'] = rand(999999, 2000000);
            echo $_SESSION['visitor_id'];
        } else{
            echo $_SESSION['user_id'];
            echo $_SESSION['user_id'].'-'.$_SESSION['user_type'];
        }
    }
}