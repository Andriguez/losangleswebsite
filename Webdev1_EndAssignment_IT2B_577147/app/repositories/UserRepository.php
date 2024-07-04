<?php
namespace Repositories;
use Models\Admin;
use Models\Artist;
use Models\Collaborator;
use Models\User;
use Models\UserType;

class UserRepository extends Repository
{
    //users table
    public function storeUser($userId, $firstname, $lastname, $email, $pronouns, $userType, $password, $pictureId){

        $query = "INSERT INTO `users` 
        (`user_Id`, `user_firstname`, `user_lastname`, `user_email`, `user_pronouns`, `user_type`, `user_password`, `user_picture`)
        VALUES (:userId, :firstname, :lastname, :email, :pronouns, :type, :password, :picture)
        ON DUPLICATE KEY UPDATE           
        `user_firstname` = VALUES(`user_firstname`),
        `user_lastname` = VALUES(`user_lastname`),
        `user_email` = VALUES(`user_email`),
        `user_pronouns` = VALUES(`user_pronouns`),
        `user_type` = VALUES(`user_type`),
        `user_password` = VALUES(`user_password`),
        `user_picture` = VALUES(`user_picture`)";

        try {
            $statement = $this->getusersDB()->prepare($query);
            $statement->execute(array(
                ':userId' => $userId,
                ':firstname' => $this->sanitizeText($firstname),
                ':lastname' => $this->sanitizeText($lastname),
                ':email' => $this->sanitizeText($email),
                ':pronouns' => $this->sanitizeText($pronouns),
                ':type' => $userType,
                ':password' => $this->sanitizeText($password),
                ':picture' => $pictureId));

        } catch (\PDOException $e) {
            error_log($e);
            echo $e->getMessage();
        }
    }

    public function updateUserPicture($pictureId, $userId){
        $query = "UPDATE `users` SET `user_picture` = :pictureId WHERE user_Id = :userId";

        try{
            $statement = $this->getusersDB()->prepare($query);

            $statement->bindParam(':pictureId', $pictureId, \PDO::PARAM_INT);
            $statement->bindParam(':userId', $userId, \PDO::PARAM_INT);

            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function deleteUser($userId){
        $query = "DELETE FROM `users` WHERE user_Id = :userId";

        try{
            $statement = $this->getusersDB()->prepare($query);

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

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $userType = $this->getTypeById($row['user_type']);
                $userId = $row['user_Id'];
                $contentRepo = new ContentRepository();

                switch ($userType->getUserType()){
                    case 'admin':
                        $user = new Admin();
                        $user->setAdminContent($contentRepo->getAdminContentById($userId));
                        break;
                    case 'artist':
                        $artistRepo = new ArtistRepository();
                        $user = new Artist();
                        $user->setArtistContent($artistRepo->getArtistContentById($userId));
                        break;
                    case 'collaborator':
                        $user = new Collaborator();
                        //$user->setCollaboratorContent($contentRepo->getCollaboratorContentById($userId));
                        break;
                    default:
                        $user = new User;
                }

                $user->setUserId($userId);
                $user->setFirstName($row['user_firstname']);
                $user->setEmail($row['user_email']);
                $user->setLastName($row['user_lastname']);
                $user->setPronouns($row['user_pronouns']);
                $user->setPassword($row['user_password']);
                $user->setUserType($this->getTypeById($userType->getUserTypeId()));

                if(!is_null($row['user_picture'])){
                    $user->setMediaInfo($contentRepo->getMediaInfoById($row['user_picture']));
                }
            }

            return $user ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getUserByEmail($email){
        $query = "SELECT user_Id FROM users WHERE LOWER(user_email) = LOWER(:email)";
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
            $statement = $this->getusersDB()->prepare($query);
            $statement->bindParam(':usertype', $usertype);
            $statement->execute();

            while($row = $statement->fetch()) {

                $user = $this->getUserById($row['user_Id']);
                $allUsers[] = $user;
            }

            return $allUsers ?? null;
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

        } catch (\PDOException $e){echo $e;}

        return $userType;
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