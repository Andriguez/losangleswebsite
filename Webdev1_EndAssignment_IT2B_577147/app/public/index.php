<?php
require_once __DIR__.'/../Router.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
Router::getInstance()->handleRequest();


