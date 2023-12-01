<?php
namespace repositories;
require __DIR__.'/../models/ArtistApplication.php';
class ArtistApplicationRepository extends Repository
{
    public function getApplicationById($id){
        $query = "SELECT `application_Id`, `applicant_name`, `applicant_stagename`, `applicant_email`,
       `applicant_pronouns`, `applicant_gender`, `applicant_location`, `applicant_discipline`, `applicant_message`,
       `applicant_socialmedia`, `application_submissiondate` FROM `artists_applications` WHERE application_Id = :id";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'ArtistApplication');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllApplications(){
        $query = "SELECT application_Id FROM artists_applications";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $application = $this->getApplicationById($row['user_Id']);
                $allApplications[] = $application;
            }

            return $allApplications;
        }catch (\PDOException $e){echo $e;}
    }
}