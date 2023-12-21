<?php
namespace controllers;
session_start();
require __DIR__ . '/Controller.php';

class connectController extends Controller
{
    public function index(){
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

            header("Location: /login");
            exit;
        }
        require __DIR__ . '/../views/connect/index2.php';
    }
}