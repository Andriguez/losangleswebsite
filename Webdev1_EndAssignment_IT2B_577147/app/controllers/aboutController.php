<?php
namespace controllers;
use services\ContentService;

require __DIR__ . '/Controller.php';
require_once __DIR__.'/../services/ContentService.php';
class aboutController extends Controller
{
    private $contentService;

    public function __construct()
    {
        $this->contentService = new ContentService();
    }
    public function index(){
        $content = $this->contentService->getAllContentByPageId(4);
        require __DIR__ . '/../views/about/index2.php';
    }

    public function getContentByElementId($elementId){
        return $this->contentService->getContentByElementId($elementId)->getText();
    }
}