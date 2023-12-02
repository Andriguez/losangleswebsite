<?php
namespace services;
use repositories\ArtistApplicationRepository;

class ArtistApplicationService
{
    private ArtistApplicationRepository $AaRepo;

    public function __construct()
    {
        $this->AaRepo = new ArtistApplicationRepository();
    }

    public function getApplicationById($applicationId){
        return $this->AaRepo->getApplicationById($applicationId);
    }
    public function getAllApplications():array{
        return $this->AaRepo->getAllApplications();
    }
}