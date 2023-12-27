<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
require_once __DIR__.'/../Router.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
Router::getInstance()->handleRequest();


