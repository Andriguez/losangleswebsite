<?php
namespace controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
use services\UserService;

require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__.'/../models/User.php';
class UserAuth
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function userLogin($email, $password){
        return $this->validateAccess($email, $password);
    }
    private function validateAccess($email, $password){
        $user = $this->userService->getUserByEmail($email);

        if (is_null($user)){
            return [false, 'email'];
        }
        else if ($user->getPassword() !== $password) //(!password_verify($password, $user->getPassword())
             {
            return [false, 'password'];}
        else{
            $_SESSION['user_id'] = $user->getUserId();
            $_SESSION['user_type'] = $user->getUserType()->getUserType();

            return [true];
        }
    }

    public function loggedUser()
    {
        return $this->getUserInSession();
    }
    private function getUserInSession(){
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

            header("Location: /login");
            exit;
        }

        return $this->userService->getUserById($_SESSION['user_id']);
    }

    public function allowAdminAccess(){
        return $this->allowAccess('admin');
    }
    private function allowAccess($userType){

        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            header("Location: /login");
            exit;
        } else if ($_SESSION['user_type'] === 'developer' || $_SESSION['user_type'] === $userType){
            return true;
        } else {
            header("Location: /");
        }

        return false;
    }

    public function hashPassword($password){
        return $this->hashAlgorithm($password);
    }
    private function hashAlgorithm($password){
        $options = ['cost' => 12];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }
}