<?php

namespace models;

class FeedComment
{
    private int $comment_Id;
    private User $comment_user;
    private FeedPost $comment_parentpost;
    private FeedComment $comment_parentcomment;
    private string $comment_text_content;

    //setters
    public function setCommentId($id){$this->comment_Id = $id;}
    public function setUser($user){$this->comment_user = $user;}
    public function setParentPost($parentPost){$this->comment_parentpost = $parentPost;}
    public function setParentComment($parentComment){$this->comment_parentcomment = $parentComment;}
    public function setContentText($text){$this->comment_text_content = $text;}

    //getters
    public function getId():int{return $this->comment_Id;}
    public function getUser():User{return $this->comment_user;}
    public function getParentPost():FeedPost{return $this->comment_parentpost;}
    public function getParentComment():FeedComment{return $this->comment_parentcomment;}
    public function getContentText():string{return $this->comment_text_content;}



}