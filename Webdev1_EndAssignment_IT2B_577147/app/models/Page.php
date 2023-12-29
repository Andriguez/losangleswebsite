<?php

namespace models;

class Page
{
    private int $page_Id;
    private string $page_title, $page_displayname, $page_url;
    private DirectoryLog $page_directory;
    private bool $page_inNavbar;

    //setters
    public function setPageId($id){$this->page_Id = $id;}
    public function setTitle($title){$this->page_title = $title;}
    public function setDisplayname($name){$this->page_displayname = $name;}
    public function setUrl($url){$this->page_url = $url;}
    public function setDirectoryPath($path){$this->page_directory = $path;}
    public function setInNavbar($bit){$this->page_inNavbar = $bit;}

    //getters
    public function getPageId():int{return $this->page_Id;}
    public function getTitle():string{return $this->page_title;}
    public function getDisplayname():string{return $this->page_displayname;}
    public function getUrl():string{return $this->page_url;}
    public function getDirectoryPath():DirectoryLog{return $this->page_directory;}
    public function getInNavbar():bool{return $this->page_inNavbar;}


}