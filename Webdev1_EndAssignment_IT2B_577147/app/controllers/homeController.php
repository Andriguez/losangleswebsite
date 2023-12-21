<?php
namespace controllers;
session_start();
require __DIR__ . '/Controller.php';
class homeController extends Controller
{
    public function index(){
        require __DIR__ . '/../views/home/index.php';
        if(!isset($_SESSION['user_id'])){
            $_SESSION['user_id'] = rand(999999, 2000000);
        }

        echo $_SESSION['user_id'];
    }
}