<?php

namespace models;

class Admin extends User
{
    protected ?AdminContent $admin_content;

    //setters
    public function setAdminContent($adminInfo){$this->admin_content = $adminInfo;}

    //getters
    public function getAdminContent(){return $this->admin_content;}

}