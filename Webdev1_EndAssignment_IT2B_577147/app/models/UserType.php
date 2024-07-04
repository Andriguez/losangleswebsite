<?php

namespace Models;

class UserType
{
    private int $usertype_Id;
    private string $usertype_name;

    //setters
    public function setUserTypeId(int $id){$this->usertype_Id = $id;}
    public function setUserType(string $type){$this->usertype_name = $type;}

    //setters
    public function getUserTypeId():int{return $this->usertype_Id;}
    public function getUserType():string{return $this->usertype_name;}

}