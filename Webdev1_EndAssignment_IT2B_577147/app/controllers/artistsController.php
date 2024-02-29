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
require __DIR__ . '/navbarController.php';


class artistsController extends Controller
{
    private ArtistService $artistService;
    private navbarController $navbar;
    public function __construct()
    {
        $this->artistService = new ArtistService();
        $this->navbar = new navbarController();
    }
    public function index($disciplineName = null, $artistName = null){
        $disciplines = $this->artistService->getAllDisciplines();

        if(isset($disciplineName)){
            $targetDiscipline = $this->artistService->getDisciplineByName($disciplineName);

            if(isset($artistName)){
                $this->displayArtistDetails($artistName, $targetDiscipline); exit;
            }
        }

        foreach ($disciplines as $discipline){
            $artists = $this->artistService->getAllArtistsByDiscipline($discipline->getDisciplineId());
            $allArtists[$discipline->getDisciplineId()] = $artists;
        }
        require __DIR__ . '/../views/artists/index.php';
    }
    private function displayArtistDetails($artistName, $discipline){
        $artist = $this->artistService->getArtistByStageName($artistName);

        if($artist->getArtistContent()->getDiscipline() == $discipline){
            require __DIR__ . '/../views/artists/detailpage.php';
        } else {\Router::getInstance()->respond(404, "artist: {$artist->getArtistContent()->getStagename()} not found in category: {$discipline->getName()}!");}

    }
}