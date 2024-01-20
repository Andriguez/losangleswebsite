<?php
namespace controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/Controller.php';
require __DIR__ . '/navbarController.php';
require_once __DIR__.'/../models/ArtistApplication.php';
require_once __DIR__ . '/../services/ArtistApplicationService.php';


use services\ArtistApplicationService;

class registerController extends Controller
{

    private ArtistApplicationService $aAService;
    private navbarController $navbar;

    public function __construct(){
        $this->aAService = new ArtistApplicationService();
        $this->navbar = new navbarController();
    }
    public function index(){
        $this->navbar->displayNavbar();
        if(isset($_SESSION['user_id'])){
            header("Location: /");
           exit;
        }
        require __DIR__ . '/../views/registerView.php';
    }

    public function submitRegistration(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->registerMessage($this->storeApplication());
        }
    }

    public function storeApplication(){
        if(!empty($_POST['inputEmail']) && !empty($_POST['inputName']) && !empty($_POST['inputSocials']) && !empty($_POST['inputMessage'])) {
            $_POST = filter_input_array(INPUT_POST);
            $name = $_POST['inputName'];
            $stagename = $_POST['inputStageName'];
            $socials = $_POST['inputSocials'];
            $email = $_POST['inputEmail'];
            $message = $_POST['inputMessage'];
            $pronouns = $_POST['inputPronouns'];
            $gender = $_POST['inputGender'];
            $location = $_POST['inputLocation'];
            $discipline = $_POST['inputDiscipline'];

            if(!empty($this->aAService->applicationEmailExists($email))){    return [false, 'existingemail'];    }

            $result = $this->aAService->storeApplication($name, $stagename, $email, $pronouns, $gender, $location, $discipline, $message, $socials);

            if($result){ return [true, 'success']; }

            return [false, 'insertfail' ];

        }
        return [false, 'emptyfields'];
    }
    private function registerMessage($error){

        $message = match ($error[1]) {
            'success' => "Thank you for sending in your details! we will review them ASAP and get back to you soon. in the meantime check our social media for more updates.",
            'existingemail' => "Something went wrong! Seems like you might already have submitted an application. We will process it ASAP and get back to you soon! in the meantime check our social media for more updates.",
            'emptyfields' => "Seems like something went wrong! One of the mandatory fields is empty. Please fill in carefully all details (specially *email, *name, *socialmedia and your *message). If you have further questions don't hesitate to contact us.",
            'insertfail' => "There was a problem storing your application. Please make sure all fields are correctly filled and try again. If the problem persists reach us.",
            default => "An unexpected error occurred! Please try submitting your details again. If the problem persists, contact us.",
        };

        $_SESSION['registerMessage'] = $message;
        $this->index();
    }
}