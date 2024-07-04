<?php
namespace Services;
use Repositories\ArtistRepository;

class ArtistService
{
    private ArtistRepository $artistRepo;

    public function __construct()
    {
        $this->artistRepo = new ArtistRepository();
    }

    public function getArtistContentById($artistId){    return $this->artistRepo->getArtistContentById($artistId);    }
    public function getAllArtistContent(){    return $this->artistRepo->getAllArtistContent();    }
    public function getAllArtistContentByDiscipline($disciplineId){   return $this->artistRepo->getAllArtistContentByDiscipline($disciplineId);    }
    public function getDisciplineById($disciplineId){  return $this->artistRepo->getDisciplineById($disciplineId); }
    public function getAllDisciplines(){    return $this->artistRepo->getAllDisciplines();  }
    public function createDiscipline($name){ $this->artistRepo->createDiscipline($name);  }
    public function deleteDiscipline($id){  $this->artistRepo->deleteDiscipline($id);   }
    public function storeArtistContent($artistId, $description, $link, $disciplineId, $email, $soundcloud, $socialmedia, $stagename, $pictureId, $location){
        $this->artistRepo->storeArtistContent($artistId, $description, $link, $disciplineId, $email, $soundcloud, $socialmedia, $stagename, $pictureId, $location);
    }
    public function deleteArtistContentByUser($userId){
        $this->artistRepo->deleteArtistContentByUserId($userId);
    }
    public function getAllArtistsByDiscipline($discipline){   return $this->artistRepo->getAllArtistsByDiscipline($discipline);  }
    public function getDisciplineByName($name){     return $this->artistRepo->getDisciplineByName($name);    }
    public function getArtistByStageName($stagename){   return $this->artistRepo->getArtistByStageName($stagename);     }
    }