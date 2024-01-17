<?php
namespace repositories;
use models\ArtistApplication;

require_once __DIR__.'/../models/ArtistApplication.php';
require_once __DIR__.'/../repositories/Repository.php';


class ArtistApplicationRepository extends Repository
{
    public function storeApplication($name, $stagename, $email, $pronouns, $gender, $location, $discipline, $message, $socialmedia){
        $query = "INSERT INTO `artists_applications` 
        (`applicant_name`, `applicant_stagename`, `applicant_email`,
       `applicant_pronouns`, `applicant_gender`, `applicant_location`, `applicant_discipline`, `applicant_message`,
       `applicant_socialmedia`, `application_submissiondate`)
        VALUES (:name, :stagename, :email, :pronouns, :gender, :location, :discipline, :message, :socialmedia, :submissiondate)
        ON DUPLICATE KEY UPDATE           
        `applicant_name` = VALUES(`applicant_name`),
        `applicant_stagename` = VALUES(`applicant_stagename`),
        `applicant_email` = VALUES(`applicant_email`),
        `applicant_pronouns` = VALUES(`applicant_pronouns`),
        `applicant_gender` = VALUES(`applicant_gender`),
        `applicant_location` = VALUES(`applicant_location`),
        `applicant_discipline` = VALUES(`applicant_discipline`),
        `applicant_message` = VALUES(`applicant_message`),
        `applicant_socialmedia` = VALUES(`applicant_socialmedia`)";

        try {
            $statement = $this->getusersDB()->prepare($query);
            $statement->execute(array(
                ':name' => $this->sanitizeText($name),
                ':stagename' => $this->sanitizeText($stagename),
                ':email' => $this->sanitizeText($email),
                ':pronouns' => $this->sanitizeText($pronouns),
                ':gender' => $this->sanitizeText($gender),
                ':location' => $this->sanitizeText($location),
                ':discipline' => $this->sanitizeText($discipline),
                ':message' => $this->sanitizeText($message),
                ':socialmedia' => $this->sanitizeText($socialmedia),
                ':submissiondate' => date("Y-m-d H:i:s")));

        } catch (\PDOException $e) {
            error_log($e);
            echo $e->getMessage();
        }
    }
    public function getApplicationById($id){
        $query = "SELECT `application_Id`, `applicant_name`, `applicant_stagename`, `applicant_email`,
       `applicant_pronouns`, `applicant_gender`, `applicant_location`, `applicant_discipline`, `applicant_message`,
       `applicant_socialmedia`, `application_submissiondate` FROM `artists_applications` WHERE application_Id = :id";

        try{
            $statement = $this->getusersDB()->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            $userRepo = new UserRepository();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $application = new ArtistApplication();
                $application->setApplicationId($row['application_Id']);
                $application->setEmail($row['applicant_email']);
                $application->setName($row['applicant_name']);
                $application->setStagename($row['applicant_stagename']);
                $application->setPronouns($row['applicant_pronouns']);
                $application->setGender($row['applicant_gender']);
                $application->setLocation($row['applicant_location']);
                $application->setDiscipline($row['applicant_discipline']);
                $application->setMessage($row['applicant_message']);
                $application->setSocialMedia($row['applicant_socialmedia']);
                $application->setIsUser(!empty($userRepo->getUserByEmail($row['applicant_email'])));

                $dateTimestring = $row['application_submissiondate'];
                $dateTime = \DateTime::createFromFormat('Y-m-d', $dateTimestring);
                $application->setSubmissionDate($dateTime);
            }

        } catch (\PDOException $e){echo $e;}

        return $application ?? null;

    }

    public function getAllApplications(){
        $query = "SELECT application_Id FROM artists_applications";

        try{
            $statement = $this->getusersDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $application = $this->getApplicationById($row['application_Id']);
                $allApplications[] = $application;
            }

        }catch (\PDOException $e){echo $e;}

        return $allApplications ?? null;
    }

    private function sanitizeText($input){
        return htmlspecialchars($input);
    }
}