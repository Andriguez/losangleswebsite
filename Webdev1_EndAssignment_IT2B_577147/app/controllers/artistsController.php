<?php
namespace controllers;
require __DIR__ . '/Controller.php';
class artistsController extends Controller
{
    public function index(){
        echo 'it reaches the index method in artist controller';
    }
}