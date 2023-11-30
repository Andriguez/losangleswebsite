<?php

namespace models;

class HomePageElement
{
    private int $homepage_content_Id;
    private string $homepage_content_name, $homepage_content_text;
    private ContentType $homepage_content_type;
    private MediaInfo $homepage_content_media;


    //setters
    public function setElementId($id){$this->homepage_content_Id = $id;}
    public function setType($type){$this->homepage_content_type = $type;}
    public function setMedia($media){$this->homepage_content_media = $media;}
    public function setName($name){$this->homepage_content_name = $name;}
    public function setText($text){$this->homepage_content_text = $text;}

    //getters
    public function getElementId():int{return $this->homepage_content_Id;}
    public function getType():ContentType{return $this->homepage_content_type;}
    public function getMedia():MediaInfo{return $this->homepage_content_media;}
    public function getName():string{return $this->homepage_content_name;}
    public function getText():string{return $this->homepage_content_text;}
}