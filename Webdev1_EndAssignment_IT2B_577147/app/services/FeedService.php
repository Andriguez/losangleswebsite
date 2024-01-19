<?php
namespace services;
use models\FeedComment;
use models\FeedPost;
use models\FeedTopic;
use repositories\FeedRepository;
require_once __DIR__ . '/../repositories/FeedRepository.php';

class FeedService
{
    private FeedRepository $feedRepo;

    public function __construct(){
        $this->feedRepo = new FeedRepository();
    }
    public function createPost($userId, $title, $content, $topic){
        $this->feedRepo->createPost($userId, $title, $content, $topic);
    }
    public function deletePost($postId){
        $this->feedRepo->deletePost($postId);
    }
    public function deletePostByUser($userId){
        $this->feedRepo->deletePostByUserId($userId);
    }
    public function deleteCommentsByUser($userId){
        $this->feedRepo->deleteCommentByUserId($userId);
    }
    public function getPostById($postId){
        return $this->feedRepo->getPostById($postId);
    }
    public function getAllPosts($limit, $currentpage){
        return $this->feedRepo->getAllPosts($limit, $currentpage);
    }
    public function getALlPostsByUser($userId){
        return $this->feedRepo->getPostsByUser($userId);
    }
    public function getAllPostsByTopic($topicId, $limit, $currentpage){
        return $this->feedRepo->getPostsByTopic($topicId, $limit, $currentpage);
    }
    public function getPostsAmountForTopic($topicId){
        return $this->feedRepo->getPostsAmountForTopic($topicId);
    }
    //public function getCommentById($commentId):FeedComment{
      //  return $this->feedRepo->getCommentById($commentId);
    //}
    public function getAllCommentsByParent($parentId){
        return $this->feedRepo->getCommentsByParentPost($parentId);
    }
    public function createFeedTopic($name){
        $this->feedRepo->createFeedTopic($name);
    }
    public function deleteFeedTopic($topicId){
        $this->feedRepo->deleteFeedTopic($topicId);
    }
    public function getTopicByName($name)
    {
        return $this->feedRepo->getTopicByName($name);
    }
    public function getTopicById($topicId){
        return $this->feedRepo->getTopicById($topicId);
    }
    public function getAllTopics(){
        return $this->feedRepo->getAllTopics();
    }
    public  function createComment($userId, $parentPost, $content){
        $this->feedRepo->createComment($userId, $parentPost, $content);
    }
    public function getPostersByTopic($topic){
        return $this->feedRepo->getPostersByTopic($topic);
    }
}