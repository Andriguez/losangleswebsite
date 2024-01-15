<?php
namespace controllers;
use models\FeedPost;
use models\FeedTopic;
use models\User;
use services\ContentService;
use services\FeedService;
use services\UserService;

session_start();
require __DIR__ . '/Controller.php';
require_once __DIR__ . '/UserAuth.php';
require __DIR__ . '/../services/FeedService.php';


class connectController extends Controller
{
    private UserService $userService;
    private ContentService $contentService;
    private FeedService $feedService;
    private UserAuth $userAuth;
    private User $loggedUser;
    private FeedTopic $selectedTopic;
    public function __construct()
    {
        $this->feedService = new FeedService();
        $this->userService = new UserService();
        $this->contentService = new ContentService();
        $this->userAuth = new UserAuth();
        $this->loggedUser = $this->userAuth->loggedUser();
        $this->selectedTopic = $this->feedService->getTopicByName('general');
    }
    public function index($selectedTopicName = null, $action = null, $selectedPostId = null){
        if (isset($this->loggedUser)) {

        $topics = $this->feedService->getAllTopics();

        if(isset($selectedTopicName)){
            $topicInput = $this->feedService->getTopicByName($selectedTopicName);
            if(!isset($topicInput)){
                \Router::getInstance()->respond(404, 'No feed topic found.');
            } else{
                $this->selectedTopic = $topicInput;
            }
        }

        $posts = $this->feedService->getAllPostsByTopic($this->selectedTopic->getTopicId());


            if (isset($selectedPostId)) {

                $this->proccessAction($action, $selectedPostId);
        } else{
                $this->proccessAction($action);
            }
            require __DIR__ . '/../views/connect/index2.php';
        }
    }

    private function proccessAction($action, $postId = null){
        switch ($action){
            case 'viewpost':
                    if(isset($postId)){ $this->displayComments($postId); }
                    exit;
                break;
            case 'postbox':
                $this->displayPostPopUp();
                break;
            case 'post':
                $this->createPost();
                break;
            case 'deletepost':
                $this->deletePost();
                break;
            case 'comment':
                $this->createComment();
                break;
            case 'deletecomment':
                $this->deleteComment();
                break;
        }
    }

    private function displayComments($postId){
        if(isset($postId)){
            $post = $this->feedService->getPostById($postId);
            $comments = $this->feedService->getAllCommentsByParent($postId);
        }
        require __DIR__ . '/../views/connect/popups/comments-popup.php';

    }

    private function displayPostPopUp(){
        if(isset($this->loggedUser)){
            if(isset($topic)){ $selectedTopic = $topic; }
            $topics = $this->feedService->getAllTopics();
            require __DIR__ . '/../views/connect/popups/post-text-popup.php';
            exit;
        }
    }

    private function createPost(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $_POST = filter_input_array(INPUT_POST);
                $inputTopic = $_POST['post-topic'];
                $inputTitle = $_POST['post-title'];
                $inputContent = $_POST['post-content'];

                $this->feedService->createPost($this->loggedUser->getUserId(), $inputTitle, $inputContent, $inputTopic);
                $this->selectedTopic = $this->feedService->getTopicById($inputTopic);
        }
        //header("Location: /feed/{$this->selectedTopic->getTopicName()}");
        //$this->index();
    }

    private function deletePost(){

    }

    private function createComment(){

    }

    private function deleteComment(){

    }

}

