<?php
namespace controllers;

use services\ContentService;
use services\UserService;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
require __DIR__ . '/../services/UserService.php';
require __DIR__ . '/../services/ContentService.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__ . '/UserAuth.php';


class adminController extends Controller
{
    protected UserService $userService;
    protected ContentService $contentService;
    private UserAuth $userAuth;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->contentService = new ContentService();
        $this->userAuth = new UserAuth();
    }

    public function index(){

        if ($this->userAuth->allowAdminAccess())
            $this->userService = new UserService();
            require __DIR__ . '/../views/admin/index.php';

    }

    public function manageHomepageLogo(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/homepage/manageLogo.php';
    }
    public function manageArtistDetails(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/manageArtistDetails.php';
    }
    public function viewDisciplines(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/viewDisciplines.php';
    }
    public function manageDiscipline(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/manageDiscipline.php';
    }
    public function viewEvents(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewEvents.php';
    }
    public function manageEvent(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageEvent.php';
    }
    public function viewLocations(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewLocations.php';
    }
    public function manageLocation(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageLocation.php';
    }
    public function viewTypes(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewTypes.php';
    }
    public function manageType(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageType.php';
    }
    public function manageAdminDetails(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/aboutpage/manageAngleDetails.php';
    }
    public function manageDescription(){
        if($this->userAuth->allowAdminAccess()){
            $content = $this->contentService->getAllContentByPageId(4);
            require __DIR__ . '/../views/admin/windows/content/aboutpage/manageDescription.php';
        }
    }
    public function viewApplications(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/applications/viewApplications.php';
    }
    public function manageApplication(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/applications/manageApplication.php';
    }
    public function viewTopics(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/feed/viewTopics.php';
    }
    public function manageTopic(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/feed/manageTopic.php';
    }
    public function viewUsers(){
        if($this->userAuth->allowAdminAccess()){
            $users = $this->userService->getAllUsers();
            $userTypes = $this->userService->getAllTypes();
            require __DIR__ . '/../views/admin/windows/users/viewUsers.php';

        }
    }
    public function manageUser($userId = null){
        if($this->userAuth->allowAdminAccess())
            if(!empty($userId)){$user = $this->userService->getUserById($userId);}
            $userTypes = $this->userService->getAllTypes();
            require __DIR__ . '/../views/admin/windows/users/manageUser.php';
    }

    public function createUser(){
        if($this->userAuth->allowAdminAccess()){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $userId = rand(999, 9999);
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $usertype = $_POST['usertype'];
                $pronouns = $_POST['pronouns'];
                //$password = $this->userAuth->hashPassword($_POST['password']);
                $password = $_POST['password'];
                $picture = null;

                if(isset($_FILES['userpicture'])){
                    $picture = $this->uploadPicture('users/','userpicture');
                }

                $this->userService->createUser($userId, $firstname, $lastname, $email, $pronouns, $usertype, $password, $picture);
            }
            header("Location: /admin");
        }
    }
    public function uploadPicture($mediaDirectory, $mediaType){
        if ($_FILES['userpicture']['error'] == UPLOAD_ERR_OK) {

            $fileName = $_FILES['userpicture']['name'];
            $tempName = $_FILES['userpicture']['tmp_name'];

            $defaultDir = 'media/';
            $path = $defaultDir.$mediaDirectory.$fileName;
            move_uploaded_file($tempName, $path);

            $directoryId = $this->contentService->createDirectory('media', $defaultDir.$mediaDirectory);

            return $this->contentService->createMediaInfo($fileName, $mediaType, $directoryId);
        }
    }

    public function updateUserInfo($userId){
        if($this->userAuth->allowAdminAccess()){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $usertype = $_POST['usertype'];
                $pronouns = $_POST['pronouns'];
                //$password = $this->userAuth->hashPassword($_POST['password']);
                $password = $_POST['password'];

                if(isset($_FILES['userpicture'])){
                    $picture = $this->uploadPicture('users/','userpicture');
                    $this->userService->updateUserPicture($picture, $userId);
                }

                $this->userService->updateUserInfo($userId, $firstname, $lastname, $email, $pronouns, $usertype, $password);
            }
            header("Location: /admin");
        }
    }

    public function deleteUSer($userId){
        if($this->userAuth->allowAdminAccess()){
            $this->userService->deleteUser($userId);
        }
        header("Location: /admin");
    }
    public function manageCollaboratorInfo(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/users/manageCollaboratorInfo.php';
    }

    /*public function hashtest(){
        $costs = [10, 11, 12, 13, 14];
        $password = 'test_password';

        foreach ($costs as $cost) {
            $start = microtime(true);

            // Adjust the algorithm and options accordingly (PASSWORD_BCRYPT or PASSWORD_ARGON2I)
            password_hash($password, PASSWORD_BCRYPT, ['cost' => $cost]);

            $end = microtime(true);
            $time = ($end - $start) * 1000; // Convert to milliseconds

            echo "Cost $cost: $time ms\n";
        }
    }*/
}