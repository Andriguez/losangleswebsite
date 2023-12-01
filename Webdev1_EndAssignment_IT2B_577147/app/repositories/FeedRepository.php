<?php
namespace repositories;
use models\FeedComment;

require __DIR__.'/../models/FeedTopic.php';
require __DIR__.'/../models/FeedPost.php';
require __DIR__.'/../models/FeedComment.php';
require __DIR__.'/../models/MediaInfo.php';
require __DIR__.'/UserRepository.php';

class FeedRepository extends Repository
{
    //posts
    public function getPostById($id){
        $query = "SELECT `post_Id`, `post_user`, `post_picture`, `post_text_content`, `post_topic`,
       `post_comments_amount`, `post_posted_at` FROM `feed_posts` WHERE post_Id = :id";

        try{
            $statement = $this->feed_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'FeedPost');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllPosts(){
        //TODO : research into how to paginate posts
        //or how to load them in chunks
        $query = "SELECT post_Id FROM feed_posts";

        try{
            $statement = $this->feed_db->prepare($query);
            $statement->execute();

            return $this->getPosts($statement->fetch(\PDO::FETCH_ASSOC));

        }catch (\PDOException $e){echo $e;}
    }

    public function getPostsByUser($userId){
        //TODO : research into how to paginate posts
        //or how to load them in chunks
        $query = "SELECT post_Id FROM feed_posts WHERE post_user = :user";

        try{
            $statement = $this->feed_db->prepare($query);
            $statement->bindParam(':user', $userId);
            $statement->execute();

            return $this->getPosts($statement->fetch(\PDO::FETCH_ASSOC));

        }catch (\PDOException $e){echo $e;}
    }

    public function getPostsByTopic($TopicId){
    //TODO : research into how to paginate posts
    //or how to load them in chunks
        $query = "SELECT post_Id FROM feed_posts WHERE post_topic = :topic";

        try{
            $statement = $this->feed_db->prepare($query);
            $statement->bindParam(':topic', $TopicId);
            $statement->execute();

            return $this->getPosts($statement->fetch(\PDO::FETCH_ASSOC));

         }catch (\PDOException $e){echo $e;}
    }

    private function getPosts($row){
        while($row) {
            $post = $this->getPostById($row['post_Id']);
            $allPosts[] = $post;
        }
        return $allPosts; }

    //comments
    private function getCommentById($id){
        $query = "SELECT `comment_Id`, `comment_user`, `comment_parentpost`, `comment_parentcomment`, 
       `comment_text_content` FROM `feed_comments` WHERE comment_Id = :id";

        try{
            $statement = $this->feed_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'FeedComment');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }
    public function getCommentsByParent($parent){
        $query = "SELECT `comment_Id` FROM `feed_comments` 
                    WHERE comment_parentpost = :parentId && comment_parentcomment IS NULL";

        if($parent::class === FeedComment::class) {
            $query = "SELECT `comment_Id` FROM `feed_comments` 
                    WHERE comment_parentcomment = :parentId";}

        try{
            $statement = $this->feed_db->prepare($query);
            $statement->bindParam(':parentId', $parent->getId());
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $comment = $this->getCommentById($row['comment_Id']);
                $comments[] = $comment;
            }

            return $comments;
        }catch (\PDOException $e){echo $e;}
    }
    //public function getCommentsByParentPost($postId){
       // $query = "SELECT `comment_Id` FROM `feed_comments`
         //           WHERE comment_parentpost = :postId && comment_parentcomment IS NULL";

        //try{
          //  $statement = $this->feed_db->prepare($query);
            //$statement->bindParam(':postId', $postId);
            //$statement->execute();

            //while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

              //  $comment = $this->getCommentById($row['comment_Id']);
                //$comments[] = $comment;
            //}

            //return $comments;
        //}catch (\PDOException $e){echo $e;}
    //}
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
    public function getTopicById($id){
        $query = "SELECT `topic_Id`, `topic_name` FROM `feed_topics` WHERE topic_Id = :id";

        try{
            $statement = $this->feed_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'FeedTopic');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllTopics(){
        $query = "SELECT topic_Id FROM feed_topics";

        try{
            $statement = $this->feed_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $topic = $this->getTopicById($row['topic_Id']);
                $allTopics[] = $topic;
            }

            return $allTopics;
        }catch (\PDOException $e){echo $e;}
    }
}