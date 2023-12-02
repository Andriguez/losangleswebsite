<?php
namespace models;

class PageContent
{
    private int $page_content_Id;
    private string $page_content_name, $page_content_text;
    private ContentType $page_content_type;
    private MediaInfo $page_content_media;
    private Page $parent_page;


    //setters
    public function setElementId($id){$this->page_content_Id = $id;}
    public function setType($type){$this->page_content_type = $type;}
    public function setMedia($media){$this->page_content_media = $media;}
    public function setName($name){$this->page_content_name = $name;}
    public function setText($text){$this->page_content_text = $text;}
    public function setParentPage($page){$this->page_content_text = $page;}


    //getters
    public function getElementId():int{return $this->page_content_Id;}
    public function getType():ContentType{return $this->page_content_type;}
    public function getMedia():MediaInfo{return $this->page_content_media;}
    public function getName():string{return $this->page_content_name;}
    public function getText():string{return $this->page_content_text;}
    public function getParentPage():Page{return $this->page_content_text;}


}