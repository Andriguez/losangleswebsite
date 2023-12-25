<?php
namespace controllers;
require __DIR__ . '/Controller.php';

class trialController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/admin/windows/users/viewUsers.php';
    }
}