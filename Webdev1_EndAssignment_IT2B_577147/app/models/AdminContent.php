<?php

namespace models;

class AdminContent
{
    private string $admin_name_link, $admin_titles, $admin_description;

    private MediaInfo $admin_picture;


    //setters
    public function setNameLink($name_link){$this->admin_name_link = $name_link;}
    public function setTitles($titles){$this->admin_titles = $titles;}
    public function setDescription($description){$this->admin_description = $description;}
    public function setPicture($media){$this->admin_picture = $media;}

    //getters
    public function getNameLink():string{return $this->admin_name_link;}
    public function getTitles():string{return $this->admin_titles;}
    public function getDescription():string{return $this->admin_description;}
    public function getMediaInfo():MediaInfo{return $this->admin_picture;}
    public function getPictureSrc():string{return $this->getMediaInfo()->getMediaPath()->getPath().$this->getMediaInfo()->getMediaFilename();}
}