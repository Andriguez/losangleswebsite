<?php
namespace controllers;

use services\ArtistService;
use services\ContentService;
use services\EventService;
use services\UserService;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
require __DIR__ . '/../services/UserService.php';
require __DIR__ . '/../services/ContentService.php';
require __DIR__ . '/../services/ArtistService.php';
require __DIR__ . '/../services/EventService.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Artist.php';
require_once __DIR__.'/../models/ArtistContent.php';
require_once __DIR__ . '/UserAuth.php';


class adminController extends Controller
{
    protected UserService $userService;
    protected ContentService $contentService;
    protected ArtistService $artistService;
    protected EventService $eventService;
    private UserAuth $userAuth;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->contentService = new ContentService();
        $this->userAuth = new UserAuth();
        $this->artistService = new ArtistService();
        $this->eventService = new EventService();
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
    public function manageArtistDetails($artistId = null){
        if($this->userAuth->allowAdminAccess()){
            $artists = $this->userService->getAllUsersByType(3);
            $disciplines = $this->artistService->getAllDisciplines();
            if(isset($artistId)){
                $selectedArtist = $this->userService->getUserById($artistId);
                $artistContent = $selectedArtist->getArtistContent();
            }
            require __DIR__ . '/../views/admin/windows/content/artistspage/manageArtistDetails.php';
        }
    }

    public function storeArtistDetails($artistId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $stagename = $_POST['stagename'];
            $discipline = $_POST['discipline'];
            $location = $_POST['location'];
            $email = $_POST['email'];
            $description = $_POST['description'];
            $socialslink = $_POST['socialslink'];
            $soundcloudlink = $_POST['soundcloudlink'];
            $extralink = $_POST['extralink'];

            if(!isset($_FILES['picture']) || $_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE){
                $artistContent = $this->artistService->getArtistContentById($artistId);

                if(!isset($artistContent)){     $picture = 1;   }
                else{
                    $picture = $artistContent->getPicture()->getMediaId(); }

            } else {
                $picture = $this->uploadPicture('artists/','artistpicture');
            }

            $this->artistService->storeArtistContent($artistId, $description, $extralink, $discipline, $email, $soundcloudlink, $socialslink, $stagename, $picture, $location);
        }
        $this->reloadPage();
    }
    public function viewDisciplines(){
        if($this->userAuth->allowAdminAccess())
            $disciplines = $this->artistService->getAllDisciplines();
            require __DIR__ . '/../views/admin/windows/content/artistspage/viewDisciplines.php';
    }
    public function manageDiscipline(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/manageDiscipline.php';
    }
    public function createDiscipline(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->artistService->createDiscipline($_POST['disciplineName']);
        }
        $this->reloadPage();
    }
    public function deleteDiscipline($disciplineid){
        if($this->userAuth->allowAdminAccess()){
            $this->artistService->deleteDiscipline($disciplineid);
        }
        $this->reloadPage();
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
        if($this->userAuth->allowAdminAccess()){
            $eventLocations = $this->eventService->getAllLocations();
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewLocations.php';
        }
    }
    public function manageLocation($locationId = null){
        if($this->userAuth->allowAdminAccess()){
            if(isset($locationId)){ $selectedLocation = $this->eventService->getLocationById($locationId);}
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageLocation.php';
        }
    }
    public function deleteLocation($locationId){
        if($this->userAuth->allowAdminAccess()){
            $this->eventService->deleteLocation($locationId);
        }
        $this->reloadPage();
    }

    public function storeLocation(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $country = $_POST['country'];
            $mapUrl = $_POST['mapurl'];

            $this->eventService->storeLocation($name, $address, $city, $country, $mapUrl);
        }
        $this->reloadPage();
    }
    public function viewEventTypes(){
        if($this->userAuth->allowAdminAccess()){
            $eventTypes = $this->eventService->getAllTypes();
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewTypes.php';
        }
    }
    public function manageEventType(){
        if($this->userAuth->allowAdminAccess()){
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageType.php';
        }
    }
    public function createEventType(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->eventService->createEventType($_POST['eventTypeName']);
        }
        $this->reloadPage();
    }
    public function deleteEventType($typeId){
        if($this->userAuth->allowAdminAccess()){
            $this->eventService->deleteEventType($typeId);
        }
        $this->reloadPage();
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
        $this->reloadPage();
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

            $this->reloadPage();
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
                $picture = 1;
                $user = $this->userService->getUserById($userId);

            if(!isset($_FILES['picture']) || $_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE && isset($user)){
                $picture = $user->getMediaInfo()->getMediaId();

            } else if(isset($_FILES['picture']) & isset($user)) {
                    $picture = $this->uploadPicture('users/','userpicture');    }


                $this->userService->storeUser($userId, $firstname, $lastname, $email, $pronouns, $usertype, $password, $picture);

            $this->reloadPage();
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
        $this->reloadPage();
    }
    public function manageCollaboratorInfo(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/users/manageCollaboratorInfo.php';
    }
    private function reloadPage(){
        header("Location: /admin");
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