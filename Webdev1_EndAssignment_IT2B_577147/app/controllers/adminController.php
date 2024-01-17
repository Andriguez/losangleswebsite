<?php
namespace controllers;

use services\ArtistApplicationService;
use services\ArtistService;
use services\ContentService;
use services\EventService;
use services\FeedService;
use services\UserService;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/Controller.php';
require __DIR__ . '/../services/UserService.php';
require __DIR__ . '/../services/ContentService.php';
require __DIR__ . '/../services/ArtistService.php';
require __DIR__ . '/../services/EventService.php';
require __DIR__ . '/../services/FeedService.php';
require __DIR__ . '/../services/ArtistApplicationService.php';

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
    protected FeedService $feedService;
    protected ArtistApplicationService $aApplicationsService;
    private UserAuth $userAuth;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->contentService = new ContentService();
        $this->userAuth = new UserAuth();
        $this->artistService = new ArtistService();
        $this->eventService = new EventService();
        $this->feedService = new FeedService();
        $this->aApplicationsService = new ArtistApplicationService();
    }

    public function index(){
        if ($this->userAuth->allowAdminAccess()){
            $this->userService = new UserService();
            require __DIR__ . '/../views/admin/index.php';
        }
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
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){

            if(isset($artistId)){
                $stagename = $_POST['stageName'];
                $discipline = $_POST['discipline'];
                $location = $_POST['location'];
                $email = $_POST['email'];
                $description = $_POST['description'];
                $socialslink = $_POST['socials'];
                $soundcloudlink = $_POST['soundcloud'];
                $extralink = $_POST['extraLink'];

                if(!isset($_FILES['picture']) || $_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE){
                    $artistContent = $this->artistService->getArtistContentById($artistId);

                    if(!isset($artistContent)){     $picture = 1;   }
                    else{
                        $picture = $artistContent->getPicture()->getMediaId(); }

                } else {
                    $picture = $this->uploadPicture('artists/','artistpicture');
                }

                $this->artistService->storeArtistContent($artistId, $description, $extralink, $discipline, $email, $soundcloudlink, $socialslink, $stagename, $picture, $location);

                $result = "details for artist: $stagename were successfully added";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No artist details have been added!"); }
        }
    }
    public function viewDisciplines(){
        if($this->userAuth->allowAdminAccess()){
            $disciplines = $this->artistService->getAllDisciplines();
            require __DIR__ . '/../views/admin/windows/content/artistspage/viewDisciplines.php';
        }
    }
    public function manageDiscipline(){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/content/artistspage/manageDiscipline.php';
    }
    public function createDiscipline(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            if(isset($data['disciplineName'])){
                $disciplineName = $data['disciplineName'];
                $this->artistService->createDiscipline($disciplineName);

                $result = "discipline $disciplineName was successfully created";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No discipline input has been found!");    }
        }
    }
    public function deleteDiscipline($disciplineid){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'GET'){

            if(isset($disciplineid)){
                $this->artistService->deleteDiscipline($disciplineid);

                $result = 'discipline has been succesfully deleted';

            } else { $result = 'no discipline has been selected'; }

            header('Content-Type: application/json;');
            echo json_encode($result);
        }
    }
    public function viewEvents(){
        if($this->userAuth->allowAdminAccess()){
            $events = $this->eventService->getAllEvents();
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewEvents.php';
        }
    }
    public function manageEvent($selectedEventId = null){
        if($this->userAuth->allowAdminAccess()){
            if(isset($selectedEventId)){ $selectedEvent = $this->eventService->getEventById($selectedEventId);}
            $eventTypes = $this->eventService->getAllTypes();
            $eventLocations = $this->eventService->getAllLocations();
            require __DIR__ . '/../views/admin/windows/content/eventspage/manageEvent.php';
        }
    }
    public function storeEvent($eventId = null){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($eventId)){

                $name =  $_POST['name'];
                $type = $_POST['type'];
                $dateTime = $_POST['datetime'];
                $location = $_POST['location'];
                $description = $_POST['description'];
                $btnText = $_POST['btnText'];
                $btnLink = $_POST['btnLink'];

                if(!isset($_FILES['picture']) || $_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE){
                    if (isset($eventId) && $eventId !=0 ){$event = $this->eventService->getEventById($eventId);}

                    if(!isset($event)){     $eventPoster = 1;   }
                    else{
                        $eventPoster = $event->getEventPoster()->getMediaId(); }

                } else {
                    $eventPoster = $this->uploadPicture('events/','eventposter');
                }

                if($eventId == 0){
                    $this->eventService->storeEvent($name, $type, $dateTime, $location, $description, $btnText, $btnLink, $eventPoster);
                } else{
                    $this->eventService->storeEvent($name, $type, $dateTime, $location, $description, $btnText, $btnLink, $eventPoster, $eventId);
                }

                $result = "details for event: $name were successfully added";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No event details have been added!");  }
        }
    }
    public function deleteEvent($eventId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'GET'){
            if(isset($eventId)){
                $this->eventService->deleteEvent($eventId);

                $result = 'Event has been successfully deleted';

            } else { $result = 'no Event has been selected'; }

            header('Content-Type: application/json;');
            echo json_encode($result);

        }
    }
    public function viewLineups($selectedEventId){
        if($this->userAuth->allowAdminAccess()){
            $events = $this->eventService->getAllEvents();
            if(isset($selectedEventId)){
                $selectedEvent = $this->eventService->getEventById($selectedEventId);
                $lineups = $this->eventService->getAllLineupsByEvent($selectedEventId); }
            require __DIR__ . '/../views/admin/windows/content/eventspage/viewEventLineups.php';
        }
    }
    public function manageLineup($lineupId = null){
        if($this->userAuth->allowAdminAccess()){
            if(isset($lineupId)){$selectedLineup = $this->eventService->getLineupById($lineupId);}
            $events = $this->eventService->getAllEvents();

            require __DIR__ . '/../views/admin/windows/content/eventspage/manageEventLineUp.php';
        }
    }
    public function storeLineUp(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            if(isset($data['event'])){
                $event = $data['event'];
                $category = $data['category'];
                $artists = $data['artists'];

                $this->eventService->storeLineup($event, $category, $artists);

                $result = "Event $category Lineup  was successfully created";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No Event Lineup input has been found!");    }
        }
    }
    public function deleteLineup($lineupId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'GET'){

            if(isset($lineupId)){
                $this->eventService->deleteLineup($lineupId);

                $result = 'Event Lineup has been successfully deleted';

            } else { $result = 'no Event Lineup has been selected'; }

            header('Content-Type: application/json;');
            echo json_encode($result);

        }
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

    public function storeLocation(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            if(isset($data['name'])){
                $name = $data['name'];
                $address = $data['address'];
                $city = $data['city'];
                $country = $data['country'];
                $mapUrl = $data['mapurl'];

                $this->eventService->storeLocation($name, $address, $city, $country, $mapUrl);

                $result = "Event Location: $name was successfully created";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No Event Location input has been found!");    }
        }
    }
    public function deleteLocation($locationId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'GET'){

            if(isset($locationId)){
                $this->eventService->deleteLocation($locationId);

                $result = 'Event Location has been successfully deleted';

            } else { $result = 'no Event Location has been selected'; }

            header('Content-Type: application/json;');
            echo json_encode($result);

        }
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
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            if(isset($data['eventTypeName'])){
                $typeName = $data['eventTypeName'];
                $this->eventService->createEventType($typeName);

                $result = "Event Type $typeName was successfully created";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No Event Type input has been found!");    }
        }
    }
    public function deleteEventType($typeId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'GET'){

            if(isset($typeId)){
                $this->eventService->deleteEventType($typeId);

                $result = 'Event Type has been successfully deleted';

            } else { $result = 'no Event Type has been selected'; }

            header('Content-Type: application/json;');
            echo json_encode($result);

        }
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
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($adminId)){

                $link = $_POST['link'];
                $titles = $_POST['titles'];
                $description = $_POST['description'];

                if(!isset($_FILES['picture']) || $_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE){
                    $adminContent = $this->contentService->getAdminContentById($adminId);

                    if(!isset($adminContent)){     $picture = 1;   }
                    else{
                        $picture = $adminContent->getMediaInfo()->getMediaId(); }

                } else {
                    $picture = $this->uploadPicture('about/','anglepicture');
                }

                $this->contentService->storeAdminContent($adminId, $link, $titles, $description, $picture);

                $adminName = $this->userService->getUserById($adminId)->getFullName();

                $result = "details for admin: $adminName were successfully added";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No admin details have been added!");  }
        }
    }
    public function manageDescription(){
        if($this->userAuth->allowAdminAccess()){
            $aboutContent = $this->contentService->getAllContentByPageId(1);
            require __DIR__ . '/../views/admin/windows/content/aboutpage/manageDescription.php';
        }
    }
    public function updateAboutContent() {
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            if(isset($data)){
                $elements = [
                    'title-text' => $data['title-text'],
                    'title-link' => $data['title-link'],
                    'about-description' => $data['about-description'],
                    'footer-text' => $data['footer-text'],
                    'footer-link' => $data['footer-link'],
                ];

                foreach ($elements as $elementId => $input) {
                    $this->contentService->updateContentTextByElementId($elementId, $input);
                }

                $result = "The details in the About page were successfully updated";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {echo json_encode("No details input has been found!");}
        }
    }
    public function viewApplications(){
        if($this->userAuth->allowAdminAccess()){
            $applications = $this->aApplicationsService->getAllApplications();
            require __DIR__ . '/../views/admin/windows/applications/viewApplications.php';
        }
    }
    public function manageApplication($applicationId){
        if($this->userAuth->allowAdminAccess()){
            if(isset($applicationId)){ $application = $this->aApplicationsService->getApplicationById($applicationId); }
            require __DIR__ . '/../views/admin/windows/applications/manageApplication.php';
        }
    }
    public function storeapplication(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            if(isset($data['email'])){
                $name = $data['name'];
                $stagename = $data['stagename'];
                $email = $data['email'];
                $location = $data['location'];
                $pronouns = $data['pronouns'];
                $gender = $data['gender'];
                $discipline = $data['discipline'];
                $message = $data['message'];
                $socials = $data['socials'];

                $success = $this->aApplicationsService->storeApplication($name,$stagename,$email,$pronouns,$gender,$location,$discipline,$message,$socials);

                if ($success){
                    $result = "Artist Application for $name was successfully edited";
                } else {$result = "There was an unexpected error trying to update the application, please check the submitted details and try it again";}
                header('Content-Type: application/json;');
                echo json_encode($result);
            }  else {   echo json_encode("No Artist Application input has been found!");    }
        }
    }

    public function displayNewUserArtistForm($applicationId){
        if($this->userAuth->allowAdminAccess()){
            if(isset($applicationId)){ $application = $this->aApplicationsService->getApplicationById($applicationId); }
            $disciplines = $this->artistService->getAllDisciplines();
            require __DIR__ . '/../views/admin/windows/applications/newuserartist.php';
        }
    }
    public function createUserFromApplication(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $userId = rand(999, 9999);
            if(isset($_POST['email']) && isset($_POST['usertype'])){

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $usertype = $_POST['usertype'];
                $pronouns = $_POST['pronouns'];
                //$password = $this->userAuth->hashPassword($_POST['password']);
                $password = $_POST['password'];
                $picture = 1;

                $this->userService->storeUser($userId, $firstname, $lastname, $email, $pronouns, $usertype, $password, $picture);

                $result = "A new collaborator has been added: applicant $firstname $lastname is now a member.!";

                if($usertype === '3'){
                    $stagename = $_POST['stagename'];
                    $discipline = $_POST['discipline'];
                    $location = $_POST['location'];
                    $description = $_POST['description'];
                    $socialslink = $_POST['socials'];

                    if(isset($_FILES['picture']) && !($_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE)){
                        $picture = $this->uploadPicture('artists/','artistpicture');    }

                    $this->artistService->storeArtistContent($userId, $description, ' ', $discipline, $email, ' ', $socialslink, $stagename, $picture, $location);

                    $result = " A new artist has been added: applicant $firstname $lastname ($stagename) is now a featured artist.";
                }

                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No user has been created or mandatory fields haven't been added!");  }
        }
    }
    public function deleteApplication($applicationId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'GET'){

            if(isset($applicationId)){
                $this->aApplicationsService->deleteArtistApplication($applicationId);

                $result = 'Artist Application has been successfully deleted';

            } else { $result = 'No Application has been selected'; }

            header('Content-Type: application/json;');
            echo json_encode($result);
        }
    }
    public function downloadArtistApplications(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_SERVER['CONTENT_TYPE'] === 'application/json'){
                $data = json_decode(file_get_contents("php://input"), true);
                $result = $this->processApplicationsJSON($data);

            } else { $result = ["status" => "error", "message" => "Incorrect content type"]; }

            header('Content-Type: application/json;');
            echo json_encode($result);
        }
    }

    public function displayArtistApplicationsInNewTab(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_SERVER['CONTENT_TYPE'] === 'application/json'){

                $data = json_decode(file_get_contents("php://input"), true);
                $result = $this->processApplicationsJSON($data);
                $applicationsJSON = htmlspecialchars(json_encode($result, JSON_PRETTY_PRINT));

            } else { $result = ["status" => "error", "message" => "Incorrect content type"]; }

            header('Content-Type: application/json;');
            echo json_encode($result);
            require __DIR__ . '/../views/admin/windows/applications/displayJSONApplications.php';
            exit;
        }
    }

    private function processApplicationsJSON($data){
        if (is_array($data)) {
            $applications = [];
            foreach ($data as $applicationId) {
                $application = $this->aApplicationsService->getApplicationById($applicationId);
                $applications[] = $application;
            }
            $result = ["status" => "success", "data" => $applications];
        } else { $result = ["status" => "error", "message" => "The data is not in the right format"]; }

        return $result;
    }
    public function viewTopics(){
        if($this->userAuth->allowAdminAccess()){
            $topics = $this->feedService->getAllTopics();
            require __DIR__ . '/../views/admin/windows/feed/viewTopics.php';
        }
    }
    public function manageTopic($topicId = null){
        if($this->userAuth->allowAdminAccess())
            require __DIR__ . '/../views/admin/windows/feed/manageTopic.php';
    }
    public function createFeedTopic(){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            if(isset($data['feedTopicName'])){
                $topicName = $data['feedTopicName'];
                $this->feedService->createFeedTopic($topicName);

                $result = "Feed Topic: $topicName was successfully created";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No Feed Topic input has been found!");    }
        }
    }
    public function deleteFeedTopic($topicId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'GET'){

            if(isset($topicId)){
                $this->feedService->deleteFeedTopic($topicId);

                $result = 'Feed Topic has been successfully deleted';

            } else { $result = 'no Feed Topic has been selected'; }

            header('Content-Type: application/json;');
            echo json_encode($result);
        }
    }
    public function viewUsers($selectedUserTypeId = null){
        if($this->userAuth->allowAdminAccess()){

            if(isset($selectedUserTypeId) && $selectedUserTypeId != 0){
                $users = $this->userService->getAllUsersByType($selectedUserTypeId);
                $selectedUserType = $this->userService->getTypeById($selectedUserTypeId);
            } else {$users = $this->userService->getAllUsers(); }

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
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!isset($userId) | $userId == 0){    $userId = rand(999, 9999);  }
            if(isset($_POST['email']) && isset($_POST['usertype'])){

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $usertype = $_POST['usertype'];
                $pronouns = $_POST['pronouns'];
                //$password = $this->userAuth->hashPassword($_POST['password']);
                $password = $_POST['password'];

                if(!isset($_FILES['picture']) || $_FILES['picture']['error'] === UPLOAD_ERR_NO_FILE){
                    $user = $this->userService->getUserById($userId);

                    if(!isset($user)){ $picture = 1; } else { $picture = $user->getMediaInfo()->getMediaId(); }

                } else {    $picture = $this->uploadPicture('users/','userpicture');    }

                $this->userService->storeUser($userId, $firstname, $lastname, $email, $pronouns, $usertype, $password, $picture);

                $result = "the information of user: $firstname $lastname was successfully added";
                header('Content-Type: application/json;');
                echo json_encode($result);

            }  else {   echo json_encode("No user info has been added!");  }
        }
    }
    public function deleteUSer($userId){
        if($this->userAuth->allowAdminAccess() && $_SERVER['REQUEST_METHOD'] === 'GET'){

            if(isset($userId)){
                $this->userService->deleteUser($userId);

                $result = 'user has been successfully deleted';

            } else { $result = 'no user has been selected'; }

            header('Content-Type: application/json;');
            echo json_encode($result);
        }
    }
    private function uploadPicture($mediaDirectory, $mediaType){
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
    //public function manageCollaboratorDetails(){
      //  if($this->userAuth->allowAdminAccess())
        //    require __DIR__ . '/../views/admin/windows/users/manageCollaboratorInfo.php';
    //}

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