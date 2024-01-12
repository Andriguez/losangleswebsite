<?php

namespace models;

use ReturnTypeWillChange;

class EventType implements \JsonSerializable
{
    private int $event_type_Id;
    private string $event_type_name;

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    //setters
    public function setTypeId($id){$this->event_type_Id = $id;}
    public function setTypeName($name){$this->event_type_name = $name;}

    //setters
    public function getTypeId():int{return $this->event_type_Id;}
    public function getTypeName():string{return $this->event_type_name;}


}