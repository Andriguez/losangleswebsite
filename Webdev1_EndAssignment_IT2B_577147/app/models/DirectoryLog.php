<?php

namespace Models;

use ReturnTypeWillChange;

class DirectoryLog implements \JsonSerializable
{
    private int $path_Id;
    private string $type, $path, $directory_name;

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    //setters
    public function setPathId($id){$this->path_Id = $id;}
    public function setFiletype($filetype){$this->type = $filetype;}
    public function setPath($path){$this->path = $path;}
    public function setDirectoryName($directory){$this->directory_name = $directory;}

    //getters
    public function getPathId():int{return $this->path_Id;}
    public function getFiletype():string{return $this->type;}
    public function getPath():string{return $this->path;}
    public function getDirectoryName(){return $this->directory_name;}


}