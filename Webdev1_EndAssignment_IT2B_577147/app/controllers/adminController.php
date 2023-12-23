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
        if ($this->allowAccess())
            require __DIR__ . '/../views/admin/index.php';

    }

    public function navbarLogo(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/navbar/manageLogo.php';
    }

    private function allowAccess(){
        $grantAccess = false;

        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            header("Location: /login");
            exit;
        } else if ($_SESSION['user_type'] === 'developer' || $_SESSION['user_type'] === 'admin'){
            $grantAccess = true;
        } else {
            header("Location: /");
        }

        return $grantAccess;
    }
}