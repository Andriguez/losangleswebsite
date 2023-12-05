<?php
namespace controllers;
require __DIR__ . '/Controller.php';
class artistsController extends Controller
{
    public function index(){
        require __DIR__ . '/../views/artists/index.php';
    }
}