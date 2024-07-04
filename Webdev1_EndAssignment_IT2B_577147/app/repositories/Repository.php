<?php
namespace Repositories;
use DB;

require_once __DIR__.'/../config/dbconfig.php';

class Repository
{
    private DB $content_db;
    private DB $users_db;
    private DB $feed_db;

    private array $configs;

    function __construct(){
        require_once __DIR__.'/../config/db.php';
        require __DIR__.'/../config/dbconfig.php';

        $this->configs = $configs;
        //$this->content_db = DB::getInstance($configs[0]);
        //$this->users_db = DB::getInstance($configs[1]);
        //$this->feed_db = DB::getInstance($configs[2]);
    }
    protected function getContentDB(){
        DB::switchDatabase($this->configs[0]);
        return $this->content_db = DB::getInstance($this->configs[0]);
    }
    protected function getusersDB(){
        DB::switchDatabase($this->configs[1]);
        return $this->users_db = DB::getInstance($this->configs[1]);
    }
    protected function getfeedDB(){
        DB::switchDatabase($this->configs[2]);
        return $this->feed_db = DB::getInstance($this->configs[2]);
    }
}