<?php
namespace controllers;
require __DIR__ . '/Controller.php';
class loginController extends Controller
{
    public function index(){
        require __DIR__ . '/../views/loginView.php';
    }
}