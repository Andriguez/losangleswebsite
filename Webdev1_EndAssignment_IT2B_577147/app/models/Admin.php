<?php

namespace models;

class Admin extends User
{
    protected AdminContent $admin_content;

    //setters
    public function setAdminInfo($adminInfo){$this->admin_content = $adminInfo;}

    //getters
    public function getAdminInfo():AdminContent{return $this->admin_content;}

}