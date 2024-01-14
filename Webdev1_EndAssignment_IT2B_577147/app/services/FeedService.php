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

    public function getPostById($postId):FeedPost{
        return $this->feedRepo->getPostById($postId);
    }
    public function getAllPosts():array{
        return $this->feedRepo->getAllPosts();
    }
    public function getALlPostsByUser($userId):array{
        return $this->feedRepo->getPostsByUser($userId);
    }
    public function getAllPostsByTopic($topicId){
        return $this->feedRepo->getPostsByTopic($topicId);
    }
    //public function getCommentById($commentId):FeedComment{
      //  return $this->feedRepo->getCommentById($commentId);
    //}
    public function getAllCommentsByParent($parentId){
        return $this->feedRepo->getCommentsByParent($parentId);
    }
    public function createFeedTopic($name){
        $this->feedRepo->createFeedTopic($name);
    }
    public function deleteFeedTopic($topicId){
        $this->feedRepo->deleteFeedTopic($topicId);
    }
    public function getTopicById($topicId){
        return $this->feedRepo->getTopicById($topicId);
    }
    public function getAllTopics(){
        return $this->feedRepo->getAllTopics();
    }
}