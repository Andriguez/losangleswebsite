<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));
require_once __DIR__.'/../Router.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
date_default_timezone_set('Europe/Amsterdam');
Router::getInstance()->handleRequest();


