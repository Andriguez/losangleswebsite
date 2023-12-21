<?php
namespace controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
require __DIR__ . '/../services/UserService.php';

class adminController extends Controller
{
    public function index(){
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            header("Location: /login");
            exit;
        } else if ($_SESSION['user_type'] === 'developer' || $_SESSION['user_type'] === 'admin'){
            require __DIR__ . '/../views/admin/index.php';
        } else {
            header("Location: /");
        }

    }
}