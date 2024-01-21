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
require __DIR__ . '/navbarController.php';
require_once __DIR__ . '/UserAuth.php';
require __DIR__ . '/../services/FeedService.php';


class connectController extends Controller
{
    private FeedService $feedService;
    private UserAuth $userAuth;
    private User $loggedUser;
    private FeedTopic $selectedTopic;
    private int $currentPage;
    private navbarController $navbar;
    public function __construct()
    {
        $this->feedService = new FeedService();
        $this->userAuth = new UserAuth();
        $this->loggedUser = $this->userAuth->loggedUser();
        $this->selectedTopic = $this->feedService->getTopicByName('general');
        $this->currentPage = isset($_GET['pagenr']) ? (int)$_GET['pagenr'] : 1;
        $this->navbar = new navbarController();

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


            if (isset($selectedPostId)) { $this->proccessAction($action, $selectedPostId);
        } else{ $this->proccessAction($action); }

            require __DIR__ . '/../views/connect/index.php';
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
                $this->createComment($postId);
                break;
            case 'deletecomment':
                $this->deleteComment();
                break;
            case 'displayposts':
                $this->displayPostsByTopic($this->currentPage);
                exit;
                break;
        }
    }
    private function displayPostsByTopic($currentPage){
        if(isset($this->selectedTopic)){
            $posts = $this->feedService->getAllPostsByTopic($this->selectedTopic->getTopicId(), 10, $currentPage);
            $totalPosts = $this->feedService->getPostsAmountForTopic($this->selectedTopic->getTopicId());
            $totalPages = ceil($totalPosts / 10);
        }
        require __DIR__ . '/../views/connect/popups/posts-window.php';
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
        if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['post-title']) && !empty($_POST['post-content'])){

                $_POST = filter_input_array(INPUT_POST);
                $inputTopic = $_POST['post-topic'];
                $inputTitle = $_POST['post-title'];
                $inputContent = $_POST['post-content'];

                $this->feedService->createPost($this->loggedUser->getUserId(), $inputTitle, $inputContent, $inputTopic);
                $this->selectedTopic = $this->feedService->getTopicById($inputTopic);
        }
        header("Location: /feed/{$this->selectedTopic->getTopicName()}");
    }

    private function deletePost(){

    }

    private function createComment($postId){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            if(!empty($data['inputComment'])){
                $commentInput = $data['inputComment'];
                $this->feedService->createComment($this->loggedUser->getUserId(),$postId, $commentInput);
            }
        }
    }

    private function deleteComment(){

    }

}

