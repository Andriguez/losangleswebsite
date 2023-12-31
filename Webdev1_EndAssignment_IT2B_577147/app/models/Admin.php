<?php

namespace models;

class Admin extends User
{
    protected ?AdminContent $admin_content;

    //setters
    public function setAdminContent($adminInfo){$this->admin_content = $adminInfo;}

    //getters
    public function getAdminContent():AdminContent{return $this->admin_content;}

}