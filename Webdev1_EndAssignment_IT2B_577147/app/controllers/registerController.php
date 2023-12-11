<?php
namespace controllers;
require __DIR__ . '/Controller.php';
namespace controllers;

class registerController extends Controller
{
    public function index(){
        require __DIR__ . '/../views/register/index.php';
    }
}