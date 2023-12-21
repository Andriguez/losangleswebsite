<?php
namespace repositories;
use DB;
require_once __DIR__.'/../config/dbconfig.php';

class Repository
{
    public DB $content_db;
    public DB $users_db;
    public DB $feed_db;

    private array $configs;

    function __construct(){
        require_once __DIR__.'/../config/db.php';
        //require_once __DIR__.'/../config/dbconfig.php';
        include __DIR__.'/../config/dbconfig.php';

        $this->configs = $configs;
        //$this->content_db = DB::getInstance($configs[0]);
        //$this->users_db = DB::getInstance($configs[1]);
        //$this->feed_db = DB::getInstance($configs[2]);
    }
    function getContentDB(){
        DB::switchDatabase($this->configs[0]);
        return $this->content_db = DB::getInstance($this->configs[0]);
    }
    function getusersDB(){
        DB::switchDatabase($this->configs[1]);
        return $this->content_db = DB::getInstance($this->configs[1]);
    }
    function getfeedDB(){
        DB::switchDatabase($this->configs[2]);
        return $this->content_db = DB::getInstance($this->configs[2]);
    }
}