<?php
namespace Controllers;
use Services\ArtistService;

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