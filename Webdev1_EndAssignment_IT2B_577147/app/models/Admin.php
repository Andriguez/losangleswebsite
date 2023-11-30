<?php

namespace models;

class Admin extends User
{
    protected bool $isAdmin;
    public function setIsAdmin($isAdmin){$this->isAdmin = $isAdmin;}
    public function getIsAdmin():bool{return $this->isAdmin;}
}