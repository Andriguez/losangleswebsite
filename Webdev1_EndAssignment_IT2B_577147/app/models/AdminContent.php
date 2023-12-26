<?php

namespace models;

class AdminContent
{
    private Admin $admin_Id;
    private string $admin_name_link, $admin_titles, $admin_description;

    private MediaInfo $admin_picture;


    //setters
    public function setAdmin($admin){$this->admin_Id = $admin;}
    public function setNameLink($name_link){$this->admin_name_link = $name_link;}
    public function setTitles($titles){$this->admin_titles = $titles;}
    public function setDescription($description){$this->admin_description = $description;}
    public function setPicture($media){$this->admin_picture = $media;}

    //getters
    public function getArtist():Admin{return $this->admin_Id;}
    public function getNameLink():string{return $this->admin_name_link;}
    public function getTitles():string{return $this->admin_titles;}
    public function getDescription():string{return $this->admin_description;}
    public function getPicture():MediaInfo{return $this->admin_picture;}
}