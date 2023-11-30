<?php

namespace models;

class AboutusPageElement
{
    private int $aboutus_page_content_Id;
    private string $aboutus_page_content_name, $aboutus_page_content_text;
    private ContentType $aboutus_page_content_type;
    private MediaInfo $aboutus_page_content_media;


    //setters
    public function setElementId($id){$this->aboutus_page_content_Id = $id;}
    public function setType($type){$this->aboutus_page_content_type = $type;}
    public function setMedia($media){$this->aboutus_page_content_media = $media;}
    public function setName($name){$this->aboutus_page_content_name = $name;}
    public function setText($text){$this->aboutus_page_content_text = $text;}

    //getters
    public function getElementId():int{return $this->aboutus_page_content_Id;}
    public function getType():ContentType{return $this->aboutus_page_content_type;}
    public function getMedia():MediaInfo{return $this->aboutus_page_content_media;}
    public function getName():string{return $this->aboutus_page_content_name;}
    public function getText():string{return $this->aboutus_page_content_text;}

}