<?php
namespace controllers;
use services\ContentService;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
require __DIR__ . '/../services/ContentService.php';

class homeController extends Controller
{
    private ContentService $contentService;

    public function __construct(){
        $this->contentService = new ContentService;
    }
    public function index(){
        $homepagePicture = $this->contentService->getAllContentByPageId(2)['homepagePicture'];
        require __DIR__ . '/../views/home/index.php';
    }
}