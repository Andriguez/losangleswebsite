<?php
namespace services;
use repositories\UserRepository;
require __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../models/User.php';


class UserService
{
    private UserRepository $userRepo;

    public function __construct(){
        $this->userRepo = new UserRepository();
    }

    public function getUserById($userId){
        return $this->userRepo->getUserById($userId);
    }
    public function getAllUsers():array{
        return $this->userRepo->getAllUsers();
    }
    public function getAllUsersByType($typeId):array{
        return $this->userRepo->getUsersByType($typeId);
    }
    public function getTypeById($typeId){
        return $this->userRepo->getTypeById($typeId);
    }
    public function getAllTypes():array{
        return $this->userRepo->getAllTypes();
    }
    public function getUserByEmail($email){
        return $this->userRepo->getUserByEmail($email);
    }
    public function createUser($userId, $firstname, $lastname, $email, $pronouns, $userType, $password, $pictureId){
        $this->userRepo->createUser($userId, $firstname, $lastname, $email, $pronouns, $userType, $password, $pictureId);
    }
    public function updateUserPicture($pictureId, $userId)
    {
        $this->updateUserPicture($pictureId, $userId);
    }
}