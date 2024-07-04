<?php

namespace Models;

class FeedTopic
{
    private int $topic_Id;
    private string $topic_name;

    //setters
    public function setTopicId($id){$this->topic_Id = $id;}
    public function setTopicName($name){$this->topic_name = $name;}

    //getters
    public function getTopicId():int{return $this->topic_Id;}
    public function getTopicName():string{return $this->topic_name;}

}