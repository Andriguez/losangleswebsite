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
    public function createPost($userId, $title, $content, $topic){
        $query = "INSERT INTO `feed_posts`(`post_user`, `post_title`, `post_text_content`, `post_topic`, post_posted_at) 
            VALUES (?,?,?,?,?)";

        try {
            $statement = $this->getfeedDB()->prepare($query);
            $statement->execute(array(
                $userId,
                $this->sanitizeText($title),
                $this->sanitizeText($content),
                $topic,
                date("Y-m-d H:i:s")));

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deletePost($postId){
        $query = "DELETE FROM `feed_posts` WHERE `post_Id` = :postId";

        try{
            $statement = $this->getfeedDB()->prepare($query);

            $statement->bindParam(':postId', $postId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function deletePostByUserId($userId){
        $query = "DELETE FROM `feed_posts` WHERE `post_user` = :userId";

        try{
            $statement = $this->getfeedDB()->prepare($query);

            $statement->bindParam(':userId', $userId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getPostById($id){
        $query = "SELECT `post_Id`, `post_user`, `post_title`, `post_picture`, `post_text_content`, `post_topic`,
       `post_posted_at` FROM `feed_posts` WHERE post_Id = :id";

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
                $post->setTextContent(html_entity_decode($row['post_text_content']));
                $post->setCommentAmount($this->getCommentAmountForPost($row['post_Id']));
                $post->setPostTitle($row['post_title']);

                $dateTime_string = $row['post_posted_at'];
                $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime_string);
                $post->setPostedAt($dateTime);

                if(is_null($row['post_picture'])){ $post->setPicture(null);}
                else {$post->setPicture($contentService->getMediaInfoById($row['post_picture']));}

            }

            return $post ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllPosts($limit, $currentpage){
        $query = "SELECT post_Id FROM feed_posts ORDER BY `post_posted_at` DESC LIMIT :limit OFFSET :offset";

        $params['limit'] = $limit;
        $offset = ($currentpage - 1) * $limit;
        $params['offset'] = $offset;

        return $this->getPosts($query, $params);
    }

    public function getPostsByUser($userId){
        $query = "SELECT post_Id FROM feed_posts WHERE post_user = :user";
        $params['user'] = $userId;

        return $this->getPosts($query, $params);
    }

    public function getPostsByTopic($topicId, $limit, $currentpage){
        $query = "SELECT post_Id FROM feed_posts WHERE post_topic = :topic ORDER BY `post_posted_at` DESC LIMIT :limit OFFSET :offset";

        $params['topic'] = $topicId;
        $params['limit'] = $limit;
        $offset = ((int)$currentpage - 1) * (int)$limit;
        $params['offset'] = $offset;

        return $this->getPosts($query, $params);
    }


    private function getPosts($query, $params = null) {
        try {
            $statement = $this->getfeedDB()->prepare($query);

            if (isset($params)) {
                foreach ($params as $pname => $pvalue) {
                    $statement->bindValue($pname, $pvalue, \PDO::PARAM_INT);
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

    public function getPostsAmountForTopic($topicId){
        $query = "SELECT COUNT(*) FROM feed_posts WHERE post_topic = :topic";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->bindParam(':topic', $topicId);
            $statement->execute();

            return $statement->fetchColumn();

        }catch (\PDOException $e){echo $e;}
    }

    //private function getPosts2($row){
      //  while($row) {
        //    $post = $this->getPostById($row['post_Id']);
          //  $allPosts[] = $post;
        //}
        //return $allPosts; }

    //comments
    public  function createComment($userId, $parentPost, $content){
        $query = "INSERT INTO `feed_comments`(`comment_user`, `comment_parentpost`, `comment_text_content`, `comment_posted_at`)
                    VALUES (?,?,?,?)";

        try {
            $statement = $this->getfeedDB()->prepare($query);
            $statement->execute(array(
                $userId,
                $parentPost,
                $this->sanitizeText($content),
                date("Y-m-d H:i:s")));

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function deleteCommentByUserId($userId){
        $query = "DELETE FROM `feed_comments` WHERE `comment_user` = :userId";

        try{
            $statement = $this->getfeedDB()->prepare($query);

            $statement->bindParam(':userId', $userId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    private function getCommentById($id){
        $query = "SELECT `comment_Id`, `comment_user`, `comment_parentpost`, `comment_text_content`, `comment_posted_at`
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

                $dateTime_string = $row['comment_posted_at'];
                $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime_string);
                $comment->setPostedAt($dateTime);

            }

            return $comment ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getCommentsByParentPost($postId){
        $query = "SELECT `comment_Id`  FROM `feed_comments`
                  WHERE comment_parentpost = :postId ORDER BY `comment_posted_at` DESC";

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

    public function getCommentAmountForPost($postId){
        $query = "SELECT COUNT(*) FROM feed_comments WHERE comment_parentpost = :postId";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->bindParam(':postId', $postId);
            $statement->execute();

            return $statement->fetchColumn();

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

    public function getTopicByName($name){
        $query = "SELECT `topic_Id` FROM `feed_topics` WHERE LOWER(topic_name) = LOWER(:name)";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->bindParam(':name', $name);
            $statement->execute();

            return $this->getTopicById($statement->fetchColumn()) ?? null;

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

    public function getPostersByTopic($topic){
        $query = "SELECT DISTINCT `post_user` FROM `feed_posts` WHERE `post_topic` = :topic";

        try{
            $statement = $this->getfeedDB()->prepare($query);
            $statement->bindParam(':topic', $topic);
            $statement->execute();

            $userRepo = new UserRepository();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $user = $userRepo->getUserById($row['post_user']);
                $allPosters[] = $user;
            }

            return $allPosters ?? null;
        }catch (\PDOException $e){echo $e;}

    }

    private function sanitizeText($input):string{
        return htmlspecialchars($input);

    }
}