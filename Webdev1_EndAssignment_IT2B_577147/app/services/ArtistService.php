<?php
namespace services;
use models\Artist;
use models\ArtistContent;
use models\ArtistDiscipline;
use repositories\ArtistRepository;
require_once __DIR__.'/../repositories/ArtistRepository.php';

class ArtistService
{
    private ArtistRepository $artistRepo;

    public function __construct()
    {
        $this->artistRepo = new ArtistRepository();
    }

    public function getArtistById($artistId):Artist{   return $this->artistRepo->getArtistById($artistId);    }
    public function getAllArtists(){    return $this->artistRepo->getAllArtists();    }
    public function getArtistContentById($artistId):ArtistContent{    return $this->artistRepo->getArtistContentById($artistId);    }
    public function getAllArtistContent(){    return $this->artistRepo->getAllArtistContent();    }
    public function getAllArtistContentByDiscipline($disciplineId){   return $this->artistRepo->getAllArtistContentByDiscipline($disciplineId);    }
    public function getDisciplineById($disciplineId):ArtistDiscipline{  return $this->artistRepo->getDisciplineById($disciplineId); }
    public function getAllDisciplines(){    return $this->artistRepo->getAllDisciplines();  }

    public function createDiscipline($name){ $this->artistRepo->createDiscipline($name);  }
    public function deleteDiscipline($id){  $this->artistRepo->deleteDiscipline($id);   }
}