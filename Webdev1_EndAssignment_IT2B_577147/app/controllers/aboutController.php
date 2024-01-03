<?php
namespace controllers;
use services\ContentService;
use services\UserService;

require __DIR__ . '/Controller.php';
require_once __DIR__.'/../services/ContentService.php';
require_once __DIR__.'/../services/UserService.php';

class aboutController extends Controller
{
    private $contentService;
    private $userService;

    public function __construct()
    {
        $this->contentService = new ContentService();
        $this->userService = new UserService();
    }
    public function index(){
        $content = $this->contentService->getAllContentByPageId(1);
        $admin = $this->userService->getUserById(1002);

        require __DIR__ . '/../views/about/index2.php';
    }

    public function getContentByElementId($elementId){
        return $this->contentService->getContentByElementId($elementId)->getText();
    }
}