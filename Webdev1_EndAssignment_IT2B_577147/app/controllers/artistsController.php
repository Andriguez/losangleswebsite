<?php
namespace Controllers;
use Models\ArtistDiscipline;
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
        try {
            $disciplines = $this->artistService->getAllDisciplines();

            if (isset($disciplineName)) {
                $targetDiscipline = $this->artistService->getDisciplineByName($disciplineName) ?? $disciplineName;

                if ($targetDiscipline === $disciplineName){
                    $this->errorHandler(404, "Category: '$disciplineName' not found");
                }

                if (isset($artistName)) {
                    $this->displayArtistDetails($artistName, $targetDiscipline);
                    exit;
                }
            }

            foreach ($disciplines as $discipline) {
                $artists = $this->artistService->getAllArtistsByDiscipline($discipline->getDisciplineId());
                $allArtists[$discipline->getDisciplineId()] = $artists;
            }
            require __DIR__ . '/../views/artists/index.php';
        } Catch (\Exception $e){
            $this->errorHandler(502, $e);
        }
    }
    private function displayArtistDetails($artistName, $discipline){
        try {

            $artist = $this->artistService->getArtistByStageName($artistName);

            if(!isset($artist)){
                $this->errorHandler(404, "Artist: '$artistName' not found");
            }

            if($artist->getArtistContent()->getDiscipline() == $discipline){
                require __DIR__ . '/../views/artists/detailpage.php';
            }

        } catch (\Exception $e){
            $this->errorHandler(500, $e->getMessage());
        }

    }
}