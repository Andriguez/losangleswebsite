<?php
namespace Controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

use Services\UserService;

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../services/UserService.php';

class navbarController extends Controller
{
    private UserService $userService;
    public function __construct(){
        $this->userService = new UserService();
    }
    public function displayNavbar()
    {
        $logoSrc = '/media/logos/logo-notriangle.jpg';

        $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
        $requestedPath = $parsedUrl['path'];
        $homepageUrls = ['/', '/index', '/index.php', '/home', '/homepage'];

        if(in_array($requestedPath, $homepageUrls)){
            $logoSrc = '/media/logos/losangles-text.png';
        }

        if (isset($_SESSION['user_id'])){ $loggedUser = $this->userService->getUserById($_SESSION['user_id']); }
        require __DIR__ . '/../views/navbar.php';
    }
}