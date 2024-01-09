<?php
namespace controllers;
use services\ArtistService;
use services\ContentService;
use services\UserService;

require __DIR__ . '/Controller.php';
require_once __DIR__.'/../services/ContentService.php';
require_once __DIR__.'/../services/UserService.php';
require_once __DIR__.'/../services/ArtistService.php';
require_once __DIR__.'/../models/ArtistDiscipline.php';

class artistsController extends Controller
{
    private $contentService;
    private $artistService;
    private $userService;
    public function __construct()
    {
        $this->contentService = new ContentService();
        $this->userService = new UserService();
        $this->artistService = new ArtistService();
    }
    public function index(){
        $disciplines = $this->artistService->getAllDisciplines();

        foreach ($disciplines as $discipline){

            $artists = $this->artistService->getAllArtistsByDiscipline($discipline->getDisciplineId());
            $allArtists[$discipline->getDisciplineId()] = $artists;
        }
        require __DIR__ . '/../views/artists/index2.php';
    }
    public function displayRequest($disciplineName, $artistsName = null){

        $display = 'error no parameters given';

        $targetDiscipline = $this->artistService->getDisciplineByName($disciplineName);

        if (isset($artistsName)){
            $this->displayArtistDetails($artistsName);
        } else if(isset($targetDiscipline)){
            $this->displayDiscipline($targetDiscipline);
        }

    }
    private function displayArtistDetails($artistName){
        $artist = $this->artistService->getArtistByStageName($artistName);

        require __DIR__ . '/../views/artists/detailpage.php';
    }
    private function displayDiscipline($discipline){

        $targetDiscipline = $discipline;

        $disciplines = $this->artistService->getAllDisciplines();
        foreach ($disciplines as $discipline){

            $artists = $this->artistService->getAllArtistsByDiscipline($discipline->getDisciplineId());
            $allArtists[$discipline->getDisciplineId()] = $artists;
        }

        require __DIR__ . '/../views/artists/index2.php';
    }
}