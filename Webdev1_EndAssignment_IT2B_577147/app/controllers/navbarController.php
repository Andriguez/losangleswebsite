<?php
namespace controllers;
require __DIR__ . '/Controller.php';

class navbarController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/navbar.php';
    }
}