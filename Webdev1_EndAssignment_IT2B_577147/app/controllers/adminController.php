<?php
namespace controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
require __DIR__ . '/../services/UserService.php';

class adminController extends Controller
{
    public function index(){
        if ($this->allowAccess())
            require __DIR__ . '/../views/admin/index.php';

    }

    public function manageHomepageLogo(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/homepage/manageLogo.php';
    }
    public function manageArtistDetails(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/manageArtistDetails.php';
    }
    public function viewDisciplines(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/viewDisciplines.php';
    }
    public function manageDiscipline(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/manageDiscipline.php';
    }
    public function viewEvents(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewEvents.php';
    }
    public function manageEvent(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageEvent.php';
    }
    public function viewLocations(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewLocations.php';
    }
    public function manageLocation(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageLocation.php';
    }
    public function viewTypes(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewTypes.php';
    }
    public function manageType(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageType.php';
    }
    public function manageAdminDetails(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/aboutpage/manageAngleDetails.php';
    }
    public function manageDescription(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/content/aboutpage/manageDescription.php';
    }
    public function viewApplications(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/applications/viewApplications.php';
    }
    public function manageApplication(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/applications/manageApplication.php';
    }
    public function viewTopics(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/feed/viewTopics.php';
    }
    public function manageTopic(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/feed/manageTopic.php';
    }
    public function viewUsers(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/users/viewUsers.php';
    }
    public function manageUser(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/users/manageUser.php';
    }
    public function manageCollaboratorInfo(){
        if($this->allowAccess())
            require __DIR__ . '/../views/admin/windows/users/manageCollaboratorInfo.php';
    }

    private function allowAccess(){

        if (!isset($_SESSION['user_id'])) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            header("Location: /login");
            exit;
        } else if ($_SESSION['user_type'] === 'developer' || $_SESSION['user_type'] === 'admin'){
            return true;
        } else {
            header("Location: /");
        }

        return false;
    }
}