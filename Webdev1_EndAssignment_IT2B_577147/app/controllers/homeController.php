<?php
namespace controllers;
require __DIR__ . '/Controller.php';
class homeController extends Controller
{
    public function index(){
        require __DIR__ . '/../views/home/index.php';
    }
}