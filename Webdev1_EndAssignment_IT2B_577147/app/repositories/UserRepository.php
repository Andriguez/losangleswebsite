<?php
namespace repositories;
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserType.php';
require_once __DIR__.'/../models/MediaInfo.php';
class UserRepository extends Repository
{
    //users table
    public function getUserById($id){
        $query = "SELECT user_Id, user_firstname, user_lastname, user_email, user_pronouns, user_picture, user_type,
       user_password FROM users WHERE user_Id = :id";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'User');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllUsers(){
        $query = "SELECT user_Id FROM users";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $user = $this->getUserById($row['user_Id']);
                $allUsers[] = $user;
            }

            return $allUsers;
        }catch (\PDOException $e){echo $e;}
    }
    public function getUsersByType($usertype){
        $query = "SELECT user_Id FROM users WHERE user_type = :usertype";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->bindParam(':usertype', $usertype);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $user = $this->getUserById($row['user_Id']);
                $allUsers[] = $user;
            }

            return $allUsers;
        }catch (\PDOException $e){echo $e;}
    }

    //usertype table
    public function getUserTypeById($id){
        $query = "SELECT usertype_Id, usertype_name FROM users_usertypes WHERE usertype_Id = :id";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'UserType');
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