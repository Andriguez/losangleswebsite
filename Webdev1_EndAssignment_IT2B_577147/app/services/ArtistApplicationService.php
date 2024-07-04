<?php
namespace Services;

use Repositories\ArtistApplicationRepository;

class ArtistApplicationService
{
    private ArtistApplicationRepository $AaRepo;

    public function __construct()
    {
        $this->AaRepo = new ArtistApplicationRepository();
    }
    public function storeApplication($name, $stagename, $email, $pronouns, $gender, $location, $discipline, $message, $socialmedia){
        return $this->AaRepo->storeApplication($name, $stagename, $email, $pronouns, $gender, $location, $discipline, $message, $socialmedia);
    }
    public function getApplicationById($applicationId){ return $this->AaRepo->getApplicationById($applicationId); }
    public function getAllApplications(){ return $this->AaRepo->getAllApplications(); }
    public function applicationEmailExists($email){ return $this->AaRepo->applicationEmailExists($email); }
    public function deleteArtistApplication($applicationId){   $this->AaRepo->deleteArtistApplication($applicationId); }
    }