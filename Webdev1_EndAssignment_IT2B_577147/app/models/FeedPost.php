<?php

namespace models;

class FeedPost
{
    private int $post_Id, $post_comment_amount;
    private User $post_user;
    private ?MediaInfo $post_picture = null;
    private string $post_text_content;
    private FeedTopic $post_topic;
    private \DateTime $post_posted_at;

    //setters
    public function setPostId($id){$this->post_Id = $id;}
    public function setCommentAmount($amount){$this->post_comment_amount = $amount;}
    public function setUser($user){$this->post_user = $user;}
    public function setPicture($mediaInfo){$this->post_picture = $mediaInfo;}
    public function setTextContent($text){$this->post_text_content = $text;}
    public function setTopic($topic){$this->post_topic = $topic;}
    public function setPostedAt($datetime){ $this->post_posted_at = $datetime;}


    //getters
    public function getId():int{return $this->post_Id;}
    public function getCommentAmount():int{return $this->post_comment_amount;}
    public function getUser():User{return $this->post_user;}
    public function getPicture():MediaInfo{return $this->post_picture;}
    public function getTextContent():string{return $this->post_text_content;}
    public function getTopic():FeedTopic{return $this->post_topic;}
    public function getPostedAt():\DateTime{return $this->post_posted_at;}



}