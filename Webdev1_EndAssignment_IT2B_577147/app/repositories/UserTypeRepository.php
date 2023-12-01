<?php
namespace repositories;
require_once __DIR__.'/../models/UserType.php';
class UserTypeRepository extends Repository
{
    public function getUserTypeById($id){
        try{

        } catch (\PDOException $e){
            echo $e;
        }
    }
}