<?php
namespace repositories;
use DB;

class Repository
{
    public $contentdb;
    public $usersdb;
    public $feeddb;

    function __construct(){
        require __DIR__.'/../config/dbconfig.php';
        require __DIR__.'/../config/db.php';

        $this->contentdb = DB::getInstance($configs[0]);
        $this->usersdb = DB::getInstance($configs[1]);
        $this->feeddb = DB::getInstance($configs[2]);
    }
}