<?php
namespace repositories;
use DB;

class Repository
{
    public DB $content_db;
    public DB $users_db;
    public DB $feed_db;

    function __construct(){
        require __DIR__.'/../config/dbconfig.php';
        require __DIR__.'/../config/db.php';

        $this->content_db = DB::getInstance($configs[0]);
        $this->users_db = DB::getInstance($configs[1]);
        $this->feed_db = DB::getInstance($configs[2]);
    }
}