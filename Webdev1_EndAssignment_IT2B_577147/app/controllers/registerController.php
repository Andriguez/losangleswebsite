<?php
namespace controllers;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/Controller.php';
require_once __DIR__.'/../models/ArtistApplication.php';
require_once __DIR__ . '/../services/ArtistApplicationService.php';


use services\ArtistApplicationService;

class registerController extends Controller
{

    private ArtistApplicationService $aAService;

    public function __construct(){
        $this->aAService = new ArtistApplicationService();
    }
    public function index(){
        if(isset($_SESSION['user_id'])){
            header("Location: /");
           exit;
        }
        require __DIR__ . '/../views/register/index.php';
    }

    public function submitRegistration(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->registerMessage($this->storeApplication());
        }
    }

    public function storeApplication(){
        if(isset($_POST['inputEmail']) && isset($_POST['inputName']) && isset($_POST['inputSocials']) && isset($_POST['inputMessage'])) {
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

            $this->aAService->storeApplication($name, $stagename, $email, $pronouns, $gender, $location, $discipline, $message, $socials);
            return [true, 'success'];
        } else{ return [false, 'emptyfields']; }
    }
    private function registerMessage($error){

        $message = match ($error[1]) {
            'success' => "Thank you for sending in your details! we will review them ASAP and get back to you soon. in the meantime check our social media for more updates.",
            'emptyfields' => "Seems like one of the mandatory fields is empty. please fill in carefully all details and if you have further questions don't hesitate to contact us.",
            default => "We don't know what went wrong, please try submitting your details again. If the problem persists, reach us.",
        };

        $_SESSION['registerMessage'] = $message;
        $this->index();
    }
}