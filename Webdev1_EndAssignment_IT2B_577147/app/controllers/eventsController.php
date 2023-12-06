<?php
namespace controllers;
require __DIR__ . '/Controller.php';

class eventsController extends Controller
{
    public function index(){
        require __DIR__ . '/../views/events/index2.php';

    }
}