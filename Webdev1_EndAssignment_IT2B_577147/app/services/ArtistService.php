<?php
namespace services;
use models\Artist;
use models\ArtistContent;
use models\ArtistDiscipline;
use repositories\ArtistRepository;
class ArtistService
{
    private ArtistRepository $artistRepo;

    public function __construct()
    {
        $this->artistRepo = new ArtistRepository();
    }

    public function getArtistById($artistId):Artist{
        return $this->artistRepo->getArtistById($artistId);
    }
    public function getAllArtists():array{
        return $this->artistRepo->getAllArtists();
    }
    public function getArtistContentById($artistId):ArtistContent{
        return $this->artistRepo->getArtistContentById($artistId);
    }
    public function getAllArtistContent():array{
        return $this->artistRepo->getAllArtistContent();
    }
    public function getAllArtistContentByDiscipline($disciplineId):array{
        return $this->artistRepo->getAllArtistContentByDiscipline($disciplineId);
    }
    public function getDisciplineById($disciplineId):ArtistDiscipline{
        return $this->artistRepo->getDisciplineById($disciplineId);
    }
    public function getAllDisciplines():array{
        return $this->artistRepo->getAllDisciplines();
    }
}