<?php

namespace models;

use ReturnTypeWillChange;

class MediaInfo implements \JsonSerializable
{
    private int $media_Id;
    private string $media_filename, $media_type;
    private DirectoryLog $media_path;

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    //setters
    public function setMediaId($id){$this->media_Id = $id;}
    public function setMediaFilename($filename){$this->media_filename = $filename;}
    public function setMediaType($type){$this->media_type = $type;}
    public function setMediaPath($path){$this->media_path = $path;}

    //getters
    public function getMediaId():int{return $this->media_Id;}
    public function getMediaFilename():string{return $this->media_filename;}
    public function getMediaType():string{return $this->media_type;}
    public function getMediaPath():DirectoryLog{return $this->media_path;}




}