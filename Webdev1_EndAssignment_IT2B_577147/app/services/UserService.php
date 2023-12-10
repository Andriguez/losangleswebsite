<?php
namespace services;
use models\User;
use models\UserType;
use repositories\UserRepository;
class UserService
{
    private UserRepository $userRepo;

    public function __construct(){
        $this->userRepo = new UserRepository();
    }

    public function getUserById($userId):User{
        return $this->userRepo->getUserById($userId);
    }
    public function getAllUsers():array{
        return $this->userRepo->getAllUsers();
    }
    public function getAllUsersByType($typeId):array{
        return $this->userRepo->getUsersByType($typeId);
    }
    public function getTypeById($typeId):UserType{
        return $this->userRepo->getTypeById($typeId);
    }
    public function getAllTypes():array{
        return $this->userRepo->getAllTypes();
    }
}