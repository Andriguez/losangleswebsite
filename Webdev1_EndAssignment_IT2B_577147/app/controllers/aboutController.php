<?php
namespace controllers;
use services\ContentService;
use services\UserService;

require __DIR__ . '/Controller.php';
require __DIR__ . '/navbarController.php';
require_once __DIR__.'/../services/ContentService.php';
require_once __DIR__.'/../services/UserService.php';

class aboutController extends Controller
{
    private ContentService $contentService;
    private UserService $userService;
    private navbarController $navbar;

    public function __construct()
    {
        $this->navbar = new navbarController();
        $this->contentService = new ContentService();
        $this->userService = new UserService();
    }
    public function index(){
        $this->navbar->displayNavbar();
        $aboutContent = $this->contentService->getAllContentByPageId(1);

        $admins = $this->userService->getAllUsersByType(2);

        require __DIR__ . '/../views/about/index2.php';
    }
}