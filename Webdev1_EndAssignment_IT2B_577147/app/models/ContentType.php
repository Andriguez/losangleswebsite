<?php

namespace Models;

class ContentType
{
    private int $content_type_Id;
    private string $content_type_name;

    //setters
    public function setTypeId($id){$this->content_type_Id = $id;}
    public function setName($name){$this->content_type_name = $name;}

    //getters
    public function getTypeId():int{return $this->content_type_Id;}
    public function getName():string{return $this->content_type_name;}

}