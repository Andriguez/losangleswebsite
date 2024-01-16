<?php
namespace services;
require_once __DIR__ . '/../repositories/ArtistApplicationRepository.php';

use repositories\ArtistApplicationRepository;

class ArtistApplicationService
{
    private ArtistApplicationRepository $AaRepo;

    public function __construct()
    {
        $this->AaRepo = new ArtistApplicationRepository();
    }
    public function storeApplication($name, $stagename, $email, $pronouns, $gender, $location, $discipline, $message, $socialmedia){
        $this->AaRepo->storeApplication($name, $stagename, $email, $pronouns, $gender, $location, $discipline, $message, $socialmedia);
    }
    public function getApplicationById($applicationId){
        return $this->AaRepo->getApplicationById($applicationId);
    }
    public function getAllApplications():array{
        return $this->AaRepo->getAllApplications();
    }
}