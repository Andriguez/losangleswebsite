<?php
namespace repositories;
use models\FeedComment;
use models\FeedPost;
use models\FeedTopic;
use services\ContentService;
use services\UserService;

require __DIR__.'/../models/FeedTopic.php';
require __DIR__.'/../models/FeedPost.php';
require __DIR__.'/../models/FeedComment.php';
require_once __DIR__.'/../models/MediaInfo.php';
require_once __DIR__.'/../services/UserService.php';
require_once __DIR__.'/../services/ContentService.php';

class FeedRepository extends Repository
{
    //posts
    public function getPostById($id){
        $query = "SELECT `post_Id`, `post_user`, `post_picture`, `post_text_content`, `post_topic`,
       `post_comments_amount`, `post_posted_at` FROM `feed_posts` WHERE post_Id = :id";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $userService = new UserService();
            $contentService = new ContentService();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $post = new FeedPost();
                $post->setPostId($row['post_Id']);
                $post->setUser($userService->getUserById($row['post_user']));
                $post->setTopic($this->getTopicById($row['post_topic']));
                $post->setTextContent($row['post_text_content']);
                $post->setCommentAmount($row['post_comments_amount']);
                $post->setPostedAt($row['post_posted_at']);

                if(is_null($row['post_picture'])){ $post->setPicture(null);}
                else {$post->setPicture($contentService->getMediaInfoById($row['post_picture']));}

            }

            return $post ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllPosts(){
        //TODO : research into how to paginate posts
        //or how to load them in chunks
        $query = "SELECT post_Id FROM feed_posts";

        return $this->getPosts($query);
    }

    public function getPostsByUser($userId){
        //TODO : research into how to paginate posts
        //or how to load them in chunks
        $query = "SELECT post_Id FROM feed_posts WHERE post_user = :user";
        $params = [':user', $userId];

        return $this->getPosts($query, $params);
    }

    public function getPostsByTopic($topicId){
    //TODO : research into how to paginate posts
    //or how to load them in chunks
        $query = "SELECT post_Id FROM feed_posts WHERE post_topic = :topic";
        $params = [':topic', $topicId];

        return $this->getPosts($query, $params);
    }
    private function getPosts($query, $params = null) {
        try {
            $statement = $this->getfeedDB()->prepare($query);

            if (isset($params)) {
                foreach ($params as $pname => $pvalue) {
                    $statement->bindParam($pname, $pvalue);
                }
            }

            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $post = $this->getPostById($row['post_Id']);
                $allPosts[] = $post;
            }
            return $allPosts ?? null;
        } catch (\PDOException $e){echo $e;}
    }

    //private function getPosts2($row){
      //  while($row) {
        //    $post = $this->getPostById($row['post_Id']);
          //  $allPosts[] = $post;
        //}
        //return $allPosts; }

    //comments
    private function getCommentById($id){
        $query = "SELECT `comment_Id`, `comment_user`, `comment_parentpost`, `comment_text_content`
                    FROM `feed_comments` WHERE comment_Id = :id";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $userService = new UserService();
            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $comment = new FeedComment();
                $comment->setCommentId($row['comment_Id']);
                $comment->setUser($userService->getUserById($row['comment_user']));
                $comment->setParentPost($this->getPostById($row['comment_parentpost']));
                $comment->setContentText($row['comment_text_content']);

            }

            return $comment ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getCommentsByParentPost($postId){
        $query = "SELECT `comment_Id` FROM `feed_comments`
                  WHERE comment_parentpost = :postId";

        try{
           $statement = $this->getfeedDB()->prepare($query);
            $statement->bindParam(':postId', $postId);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

               $comment = $this->getCommentById($row['comment_Id']);
                $comments[] = $comment;
            }

            return $comments ?? null;
        }catch (\PDOException $e){echo $e;}
    }
    //public function getCommentsByParentComment($commentId){
     //   $query = "SELECT `comment_Id` FROM `feed_comments`
       //             WHERE comment_parentcomment = :commentId";

        //try{
          //  $statement = $this->feed_db->prepare($query);
            //$statement->bindParam(':commentId', $commentId);
            //$statement->execute();

            //while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

              //  $topic = $this->getCommentById($row['comment_Id']);
                //$allTopics[] = $topic;
            //}

            //return $allTopics;
        //}catch (\PDOException $e){echo $e;}
    //}

    //topics
    public function createFeedTopic($name){
        $query = "INSERT INTO `feed_topics`(`topic_name`) VALUES (?)";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->execute([$this->sanitizeText($name)]);

        } catch (\PDOException $e){
            echo $e;
        }
    }
    public function deleteFeedTopic($topicId){
        $query = "DELETE FROM `feed_topics` WHERE topic_Id = :topicId";

        try{
            $statement = $this->getfeedDB()->prepare($query);

            $statement->bindParam(':topicId', $topicId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getTopicById($id){
        $query = "SELECT `topic_Id`, `topic_name` FROM `feed_topics` WHERE topic_Id = :id";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $topic = new FeedTopic();
                $topic->setTopicId($row['topic_Id']);
                $topic->setTopicName($row['topic_name']);

            }

            return $topic ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllTopics(){
        $query = "SELECT topic_Id FROM feed_topics";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $topic = $this->getTopicById($row['topic_Id']);
                $allTopics[] = $topic;
            }

            return $allTopics ?? null;
        }catch (\PDOException $e){echo $e;}
    }

    private function sanitizeText($input):string{
        return htmlspecialchars($input);

    }
}