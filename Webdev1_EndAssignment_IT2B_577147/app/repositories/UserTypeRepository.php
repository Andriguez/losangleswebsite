<?php
namespace repositories;
require_once __DIR__.'/../models/UserType.php';
class UserTypeRepository extends Repository
{
    public function getUserTypeById($id){
        $query = "SELECT usertype_Id, usertype_name FROM users_usertypes WHERE usertype_Id = :id";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(PDO::FETCH_CLASS, 'UserType');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllUserTypes(){
        $query = "SELECT usertype_Id FROM users_usertypes";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $userType = $this->getUserTypeById($row['usertype_Id']);
                $allUserTypes[] = $userType;
            }

            return $allUserTypes;
        }catch (\PDOException $e){echo $e;}
    }
}