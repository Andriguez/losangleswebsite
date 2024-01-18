<?php

namespace models;

use ReturnTypeWillChange;

class ArtistApplication implements \JsonSerializable
{
    private int $application_Id;
    private string $applicant_name,$applicant_stagename,$applicant_email,
        $applicant_pronouns,$applicant_gender, $applicant_location,
        $applicant_discipline,$applicant_message,$applicant_socialmedia;
    private \DateTime $application_submissiondate;
    private bool $isUser;

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        return [
            'applicant_name' => $this->applicant_name,
            'applicant_stagename' => $this->applicant_stagename,
            'applicant_email' => $this->applicant_email,
            'applicant_pronouns' => $this->applicant_pronouns,
            'applicant_gender' => $this->applicant_gender,
            'applicant_location' => $this->applicant_location,
            'applicant_discipline' => $this->applicant_discipline,
            'applicant_message' => $this->applicant_message,
            'applicant_socialmedia' => $this->applicant_socialmedia,
            'application_submissiondate' => $this->application_submissiondate->format('d/m/Y'),
            'applicant_isAngle' => $this->isUser
        ];
    }

    //setters
    public function setApplicationId($id){$this->application_Id = $id;}
    public function setName($name){$this->applicant_name = $name;}
    public function setStagename($stagename){$this->applicant_stagename = $stagename;}
    public function setEmail($email){$this->applicant_email = $email;}
    public function setPronouns($pronouns){$this->applicant_pronouns = $pronouns;}
    public function setGender($gender){$this->applicant_gender = $gender;}
    public function setLocation($location){$this->applicant_location = $location;}
    public function setDiscipline($discipline){$this->applicant_discipline = $discipline;}
    public function setMessage($message){$this->applicant_message = $message;}
    public function setSocialMedia($socialmedia){$this->applicant_socialmedia = $socialmedia;}
    public function setSubmissionDate($datetime){ $this->application_submissiondate = $datetime;}
    public function setIsUser($isUser) { $this->isUser = $isUser; }


    //getters
    public function getApplicationId():int{return $this->application_Id;}
    public function getName(){return $this->applicant_name;}
    public function getFirstName(){
        $result = explode(' ',$this->applicant_name, 2);
        return $result[0];}
    public function getLastName(){
    $result = explode(' ',$this->applicant_name, 2);
    return $result[1];}
    public function getStagename(){return $this->applicant_stagename;}
    public function getEmail(){return $this->applicant_email;}
    public function getPronouns(){return $this->applicant_pronouns;}
    public function getGender(){return $this->applicant_gender;}
    public function getLocation(){return $this->applicant_location;}
    public function getDiscipline(){return $this->applicant_discipline;}
    public function getMessage(){return $this->applicant_message;}
    public function getSocialMedia(){return $this->applicant_socialmedia;}
    public function getSubmissionDate():\DateTime{return $this->application_submissiondate;}
    public function getIsUser(){return $this->isUser;}

}