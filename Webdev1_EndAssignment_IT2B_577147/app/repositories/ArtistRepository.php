<?php
namespace repositories;
use models\Artist;
use models\ArtistContent;
use models\ArtistDiscipline;
use mysql_xdevapi\Exception;

require_once __DIR__.'/../models/Artist.php';
require_once __DIR__.'/../models/ArtistDiscipline.php';
require_once __DIR__.'/../models/ArtistContent.php';
require_once __DIR__.'/UserRepository.php';
require_once __DIR__.'/../models/MediaInfo.php';

class ArtistRepository extends Repository
{
    //content
    public function getArtistContentById($artistId){
        $query = "SELECT `artist_description`, `artist_discipline`, `artist_extralink`, `artist_email`,
       `artist_soundcloud_url`, `artist_socialmedia`, `artist_stagename`, `artist_picture`, `artist_location` 
       FROM `artist_content` WHERE artist_Id = :artistId";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':$artistId', $artistId, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $artistContent = new ArtistContent();
                $artistContent->setDescription($row['artist_description']);
                $artistContent->setDiscipline($this->getDisciplineById(['artist_discipline']));
                $artistContent->setExtraLink($row['artist_extralink']);
                $artistContent->setEmail($row['artist_email']);
                $artistContent->setSoundcloudUrl($row['artist_soundcloud_url']);
                $artistContent->setSocials($row['artist_socialmedia']);
                $artistContent->setStagename($row['artist_stagename']);
                $artistContent->setLocation($row['artist_location']);

                $contentRepo = new ContentRepository();
                $artistContent->setDescription($contentRepo->getMediaInfoById($row['artist_picture']));
            }

            return $artistContent ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllArtistContent(){
        $query = "SELECT artist_Id FROM artist_content";
        return $this->getContent($query);
    }
    public function getAllArtistContentByDiscipline($disciplineId){
        $query = "SELECT artist_Id FROM artist_content WHERE artist_discipline = :discipline";
        $params = [':discipline', $disciplineId];

        return $this->getContent($query,$params);
    }

    private function getContent($query, $params = null) {
        try {
            $statement = $this->getContentDB()->prepare($query);

            if (isset($params)) {
                foreach ($params as $pname => $pvalue) {
                    $statement->bindParam($pname, $pvalue);}
            }

            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $content = $this->getArtistContentById($row['artist_Id']);
                $allContent[] = $content;
            }
            return $allContent;
        } catch (\PDOException $e){echo $e;}
    }

    //disciplines
    public function createDiscipline($name){
        $query = "INSERT INTO `artist_disciplines`(`artist_discipline_name`) VALUES (?)";

        try{
                $statement = $this->getContentDB()->prepare($query);
                $statement->execute([$this->sanitizeText($name)]);

        } catch (\PDOException $e){
            echo $e;
        }

    }

    public function deleteDiscipline($disciplineId){
        $query = "DELETE FROM `artist_disciplines` WHERE artist_discipline_Id = :disciplineId";

        try{
            $statement = $this->getContentDB()->prepare($query);

            $statement->bindParam(':disciplineId', $disciplineId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getDisciplineById($id){
        $query = "SELECT `artist_discipline_Id`, `artist_discipline_name` FROM
        `artist_disciplines` WHERE artist_discipline_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $discipline = new ArtistDiscipline();
                $discipline->setDisciplineId($row['artist_discipline_Id']);
                $discipline->setName($row['artist_discipline_name']);
            }
            return $discipline;


        } catch (\PDOException $e){echo $e;}
    }

    public function getAllDisciplines(){
        $query = "SELECT artist_discipline_Id FROM artist_disciplines";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $discipline = $this->getDisciplineById($row['artist_discipline_Id']);
                $allDisciplines[] = $discipline;
            }

            return $allDisciplines ?? null;
        }catch (\PDOException $e){echo $e;}
    }

    private function sanitizeText($input):string{
        return htmlspecialchars($input);

    }
}
