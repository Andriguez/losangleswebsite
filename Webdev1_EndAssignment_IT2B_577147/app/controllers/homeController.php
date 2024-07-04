<?php
namespace Controllers;
use Services\ContentService;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class homeController extends Controller
{
    private ContentService $contentService;
    private navbarController $navbar;

    public function __construct(){
        $this->contentService = new ContentService;
        $this->navbar = new navbarController();
    }
    public function index(){
        $this->navbar->displayNavbar();
        $homepagePicture = $this->contentService->getAllContentByPageId(2)['homepagePicture'];
        require __DIR__ . '/../views/home/index.php';
    }
}