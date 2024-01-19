<?php
namespace controllers;
require __DIR__ . '/Controller.php';

class trialController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../config/image_display_api.php';
    }
}