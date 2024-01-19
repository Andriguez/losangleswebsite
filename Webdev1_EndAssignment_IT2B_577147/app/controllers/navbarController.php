<?php
namespace controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use services\UserService;

if (session_status() == PHP_SESSION_NONE) {
    session_start();}
require_once __DIR__ . '/Controller.php';
require __DIR__ . '/../services/UserService.php';


class navbarController extends Controller
{
    private UserService $userService;
    public function __construct(){
        $this->userService = new UserService();
    }
    public function displayNavbar()
    {
        if (isset($_SESSION['user_id'])){ $loggedUser = $this->userService->getUserById($_SESSION['user_id']); }
        require __DIR__ . '/../views/navbar.php';
    }
}