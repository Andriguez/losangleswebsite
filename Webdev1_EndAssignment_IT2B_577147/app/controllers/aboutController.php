<?php
namespace Controllers;
use Services\ContentService;
use Services\UserService;

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

        require __DIR__ . '/../views/about/index.php';
    }
}