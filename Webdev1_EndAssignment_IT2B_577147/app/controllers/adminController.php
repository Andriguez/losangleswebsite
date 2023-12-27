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

    public function manageHomepageLogo(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/homepage/manageLogo.php';
    }
    public function manageArtistDetails(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/manageArtistDetails.php';
    }
    public function trialFunction(){
        echo 'it works';
    }
    private function allowAccess(){

        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            header("Location: /login");
            exit;
        } else if ($_SESSION['user_type'] === 'developer' || $_SESSION['user_type'] === 'admin'){
            return true;
        } else {
            header("Location: /");
        }

        return false;
    }
}