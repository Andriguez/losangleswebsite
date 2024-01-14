<?php
namespace controllers;
use services\ContentService;
use services\FeedService;
use services\UserService;

session_start();
require __DIR__ . '/Controller.php';
require __DIR__ . '/../services/FeedService.php';


class connectController extends Controller
{
    private UserService $userService;
    private ContentService $contentService;
    private FeedService $feedService;
    public function __construct()
    {
        $this->feedService = new FeedService();
        $this->userService = new UserService();
        $this->contentService = new ContentService();
    }
    public function index($selectedTopicName = null){
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

            header("Location: /login");
            exit;
        }
        $topics = $this->feedService->getAllTopics();
        $loggedUser = $this->userService->getUserById($_SESSION['user_id']);

        if(!isset($selectedTopicName)){
            $selectedTopicName = 'general';
        }

        $selectedTopic = $this->feedService->getTopicByName($selectedTopicName);
        if(!isset($selectedTopic)){
            \Router::getInstance()->respond(404, 'No feed topic found.');
        }

        $posts = $this->feedService->getAllPostsByTopic($selectedTopic->getTopicId());

        require __DIR__ . '/../views/connect/index2.php';
    }
}