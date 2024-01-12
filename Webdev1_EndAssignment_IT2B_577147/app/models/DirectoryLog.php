<?php

namespace models;

use ReturnTypeWillChange;

class DirectoryLog implements \JsonSerializable
{
    private int $path_Id;
    private string $type, $path;

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    //setters
    public function setPathId($id){$this->path_Id = $id;}
    public function setFiletype($filetype){$this->type = $filetype;}
    public function setPath($path){$this->path = $path;}

    //getters
    public function getPathId():int{return $this->path_Id;}
    public function getFiletype():string{return $this->type;}
    public function getPath():string{return $this->path;}

}