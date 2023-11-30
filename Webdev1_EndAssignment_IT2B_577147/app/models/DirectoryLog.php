<?php

namespace models;

class DirectoryLog
{
    private int $path_Id;
    private string $filename, $filetype, $path;

    //setters
    public function setPathId($id){$this->path_Id = $id;}
    public function setFilename($filename){$this->filename = $filename;}
    public function setFiletype($filetype){$this->filetype = $filetype;}
    public function setPath($path){$this->path = $path;}

    //getters
    public function getPathId():int{return $this->path_Id;}
    public function getFilename():string{return $this->filename;}
    public function getFiletype():string{return $this->filetype;}
    public function getPath():string{return $this->path;}

}