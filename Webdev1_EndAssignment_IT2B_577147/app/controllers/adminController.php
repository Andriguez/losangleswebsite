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
    public function manageAdminDetails($adminId = null){
        if($this->userAuth->allowAdminAccess())
            $users = $this->userService->getAllUsersByType(2);
            if(isset($adminId)){
                $selectedAdmin = $this->userService->getUserById($adminId);
                $adminContent = $selectedAdmin->getAdminContent();
            }
            require __DIR__ . '/../views/admin/windows/content/aboutpage/manageAngleDetails.php';
    }

    public function storeAdminContent($adminId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $link = $_POST['link'];
            $titles = $_POST['titles'];
            $description = $_POST['description'];

            if(!isset($_FILES['picture']) || $_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE){
                $adminContent = $this->contentService->getAdminContentById($adminId);
                $picture = $adminContent->getMediaInfo()->getMediaId();
            } else {
                $picture = $this->uploadPicture('about/','anglepicture');
            }

            $this->contentService->storeAdminContent($adminId, $link, $titles, $description, $picture);
        }
    }
    public function manageDescription(){
        if($this->userAuth->allowAdminAccess()){
            require __DIR__ . '/../views/admin/windows/content/aboutpage/manageDescription.php';
        }
    }
    public function updateAboutContent() {
        if ($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $elements = [
                'title-text' => $_POST['title-text'],
                'title-link' => $_POST['title-link'],
                'about-description' => $_POST['about-description'],
                'footer-text' => $_POST['footer-text'],
                'footer-link' => $_POST['footer-link'],
            ];

            foreach ($elements as $elementId => $input) {
                $this->contentService->updateContentTextByElementId($elementId, $input);
            }

            header("Location: /admin");
        }
    }
    public function getElementContent($elementId){
        return $this->contentService->getContentByElementId($elementId)->getText();
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

    public function storeUser($userId = null){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'POST'){

                if(!isset($userId)){    $userId = rand(999, 9999);  }
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $usertype = $_POST['usertype'];
                $pronouns = $_POST['pronouns'];
                //$password = $this->userAuth->hashPassword($_POST['password']);
                $password = $_POST['password'];

                if(!isset($_FILES['picture']) || $_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE && isset($userId)){
                $user = $this->userService->getUserById($userId);
                $picture = $user->getMediaInfo()->getMediaId();

                } else if(isset($_FILES['picture'])) {    $picture = $this->uploadPicture('users/','userpicture');
                } else {    $picture = 1;   }


                $this->userService->storeUser($userId, $firstname, $lastname, $email, $pronouns, $usertype, $password, $picture);

            header("Location: /admin");
        }
    }
    public function uploadPicture($mediaDirectory, $mediaType){
        if ($_FILES['picture']['error'] == UPLOAD_ERR_OK) {

            $fileName = $_FILES['picture']['name'];
            $tempName = $_FILES['picture']['tmp_name'];

            $defaultDir = 'media/';
            $path = $defaultDir.$mediaDirectory.$fileName;
            move_uploaded_file($tempName, $path);

            $directoryId = $this->contentService->createDirectory('media', $defaultDir.$mediaDirectory);

            return $this->contentService->createMediaInfo($fileName, $mediaType, $directoryId);
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