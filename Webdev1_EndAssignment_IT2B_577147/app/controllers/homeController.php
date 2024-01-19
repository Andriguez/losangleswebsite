<?php
namespace controllers;
use services\ContentService;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
require __DIR__ . '/navbarController.php';
require __DIR__ . '/../services/ContentService.php';

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
        $homepagePictureSrc = "/img/?p={$homepagePicture->getMedia()->getMediaPath()->getDirectoryName()}&i={$homepagePicture->getMedia()->getMediaFilename()}";
        require __DIR__ . '/../views/home/index.php';
    }
}