<?php
namespace repositories;
use models\User;
use models\UserType;

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserType.php';
require_once __DIR__.'/../models/MediaInfo.php';
require __DIR__ . '/../repositories/Repository.php';
require __DIR__ . '/../repositories/ContentRepository.php';

class UserRepository extends Repository
{
    //users table
    public function createUser($userId, $firstname, $lastname, $email, $pronouns, $userType, $password, $pictureId = null){
        $query = "INSERT INTO `users`(`user_Id`, `user_firstname`, `user_lastname`, `user_email`, `user_pronouns`,
                    `user_type`, `user_password`) VALUES (?,?,?,?,?,?,?)";

        try {
            $statement = $this->getusersDB()->prepare($query);
            $statement->execute(array(
                $userId,
                $this->sanitizeText($firstname),
                $this->sanitizeText($lastname),
                $this->sanitizeText($email),
                $this->sanitizeText($pronouns),
                $userType,
                $this->sanitizeText($password),));

            if(isset($picture)){
                $this->updateUserPicture($pictureId, $userId);
            }

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

    }
    public function updateUserPicture($pictureId, $userId){
        $query = "UPDATE `users` SET `user_picture`=- :picturId WHERE user_Id = :userId";

        try{
            $statement = $this->getusersDB()->prepare($query);

            $statement->bindParam(':pictureId', $pictureId, \PDO::PARAM_INT);
            $statement->bindParam(':userId', $userId, \PDO::PARAM_INT);

            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getUserById($id){
        $query = "SELECT user_Id, user_firstname, user_lastname, user_email, user_pronouns, user_picture, user_type,
       user_password FROM users WHERE user_Id = :id";

        try{
            $statement = $this->getusersDB()->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            //$statement->setFetchMode(\PDO::FETCH_CLASS, 'models\User');
            //return $statement->fetch();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $user = new User();
                $user->setUserId($row['user_Id']);
                $user->setFirstName($row['user_firstname']);
                $user->setEmail($row['user_email']);
                $user->setLastName($row['user_lastname']);
                $user->setPronouns($row['user_pronouns']);
                $user->setPassword($row['user_password']);
                $user->setUserType($this->getTypeById($row['user_type']));

                if(!is_null($row['user_picture'])){
                    $contentRepo = new ContentRepository();
                    $user->setMediaInfo($contentRepo->getMediaInfoById($row['user_picture']));
                }

            }

            return $user ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getUserByEmail($email){
        $query = "SELECT user_Id FROM users WHERE user_email = :email";
        $sanitizedEmail = $this->sanitizeText($email);

        try{
            $statement = $this->getusersDB()->prepare($query);
            $statement->bindParam(':email', $sanitizedEmail);


            $statement->execute();

            return $this->getUserById($statement->fetchColumn());
        } catch (\PDOException $e){echo $e;}
    }

    public function getAllUsers(){
        $query = "SELECT user_Id FROM users";

        try{
            $statement = $this->getusersDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch()) {

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

            while($row = $statement->fetchColumn()) {

                $user = $this->getUserById($row['user_Id']);
                $allUsers[] = $user;
            }

            return $allUsers;
        }catch (\PDOException $e){echo $e;}
    }

    //usertype table
    public function getTypeById($id){
        $query = "SELECT usertype_Id, usertype_name FROM users_usertypes WHERE usertype_Id = :id";

        try{
            $statement = $this->getusersDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $userType = new UserType();
                $userType->setUserTypeId($row['usertype_Id']);
                $userType->setUserType($row['usertype_name']);
            }
            return $userType;

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllTypes(){
        $query = "SELECT usertype_Id FROM users_usertypes";

        try{
            $statement = $this->getusersDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch()) {

                $userType = $this->getTypeById($row['usertype_Id']);
                $allUserTypes[] = $userType;
            }

            return $allUserTypes;
        }catch (\PDOException $e){echo $e;}
    }

    private function sanitizeText($input):string{
        return htmlspecialchars($input);

    }
}