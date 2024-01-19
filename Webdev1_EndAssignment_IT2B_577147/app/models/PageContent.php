<?php
namespace models;

class PageContent
{
    private int $page_content_Id;
    private ?string $page_content_text = null;
    private string $element_Id;

    private ContentType $page_content_type;
    private ?MediaInfo $page_content_media = null;
    private Page $parent_page;


    //setters
    public function setContentId($id){$this->page_content_Id = $id;}
    public function setElementId($id){$this->element_Id = $id;}

    public function setType($type){$this->page_content_type = $type;}
    public function setMedia($media){$this->page_content_media = $media;}
    public function setText($text){$this->page_content_text = $text;}
    public function setParentPage($page){$this->parent_page = $page;}


    //getters
    public function getElementId():string{return $this->element_Id;}
    public function getContentId():int{return $this->page_content_Id;}

    public function getType():ContentType{return $this->page_content_type;}
    public function getMedia(){return $this->page_content_media;}
    public function getPictureSrc(){return "/img/?p={$this->getMedia()->getMediaPath()->getDirectoryName()}&i={$this->getMedia()->getMediaFilename()}"; }
    public function getText(){return $this->page_content_text;}
    public function getParentPage():Page{return $this->parent_page;}


}