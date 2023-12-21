<?php
namespace controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
require __DIR__ . '/../services/UserService.php';
require_once __DIR__.'/../models/User.php';

use JetBrains\PhpStorm\NoReturn;
use services\UserService;

class loginController extends Controller
{
    protected UserService $userService;
    public function index(){
        if(isset($_SESSION['user_id'])){
            $this->redirectPage();
        }

        require __DIR__ . '/../views/loginView.php';

    }

    public function access(){
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $_POST = filter_input_array(INPUT_POST);
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->validateAccess($email, $password);

        }
    }

    private function validateAccess($email, $password){
        $this->userService = new UserService();
        $user = $this->userService->getUserByEmail($email);

        if (is_null($user)){
            $this->loginError('email');
        }
        else if ($user->getPassword() !== $password) {
            $this->loginError('password');}
        else{
            $_SESSION['user_id'] = $user->getUserId();
            $_SESSION['user_type'] = $user->getUserType()->getUserType();

            $this->redirectPage();
    } }

     #[NoReturn] private function redirectPage(){

        if(isset($_SESSION['redirect_url'])) {
            $redirectUrl = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']);

            header("Location: $redirectUrl");
        } else {
            header("Location: /");
        }
        exit;
    }

    private function loginError($error){

        $message = match ($error) {
            'email' => "This email is not linked to any user. If you have registered: Please make sure your email is correct and try again. If nothing changes contact us.",
            'password' => "Seems like the password is incorrect. feel free to try again but In case you have forgotten the password, you can contact us ",
            default => "It's unclear what went wrong, verify your details and try again. If nothing changes, reach us.",
        };

        $_SESSION['loginError'] = $message;
        $this->index();
    }
    public function logOut(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_type']);
            session_destroy();
        $this->redirectPage();
    }
}
