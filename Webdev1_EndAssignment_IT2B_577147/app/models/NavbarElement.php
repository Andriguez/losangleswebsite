<?php

namespace models;

class NavbarElement
{
    private int $navbar_content_Id;
    private ContentType $navbar_content_type;
    private MediaInfo $navbar_content_media;
    private Page $navbar_content_page;
    private string $navbar_content_text, $navbar_content_url;

    //setters
    public function setElementId($id){$this->navbar_content_Id = $id;}
    public function setType($type){$this->navbar_content_type = $type;}
    public function setMedia($media){$this->navbar_content_media = $media;}
    public function setPage($page){$this->navbar_content_page = $page;}
    public function setText($text){$this->navbar_content_text = $text;}
    public function setUrl($url){$this->navbar_content_url = $url;}

    //getters
    public function getElementId():int{return $this->navbar_content_Id;}
    public function getType():ContentType{return $this->navbar_content_type;}
    public function getMedia():MediaInfo{return $this->navbar_content_media;}
    public function getPage():Page{return $this->navbar_content_page;}
    public function getText():string{return $this->navbar_content_text;}
    public function getUrl():string{return $this->navbar_content_url;}







}