<?php
namespace repositories;
use models\Artist;
require __DIR__.'/../models/Artist.php';
require __DIR__.'/../models/ArtistDiscipline.php';
require __DIR__.'/../models/ArtistContent.php';
require __DIR__.'/UserRepository.php';
require __DIR__.'/../models/MediaInfo.php';

class ArtistRepository extends Repository
{
    //artists
    public function getArtistById(int $id){
        $query = "SELECT  `user_firstname`, `user_lastname`, `user_email`, `user_pronouns`,`user_picture`,
        `user_type`, `user_password` FROM `users` WHERE user_Id = :Id";

        try{
            $statement = $this->users_db->prepare($query);
            $statement->bindParam(':Id', $id);
            $statement->execute();

            $userRepo = new UserRepository();
            $mediaRepo = new MediaInfoRepository();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $artist = new Artist();
                $artist->setUserId($id);
                $artist->setFirstName($row['user_firstname']);
                $artist->setLastName($row['user_lastname']);
                $artist->setEmail($row['user_email']);
                $artist->setPronouns($row['user_pronouns']);
                $artist->setPassword($row['user_password']);
                $artist->setUserType($userRepo->getUserTypeById($row['user_type']));
                $artist->setMediaInfo($mediaRepo->getMediaInfoById($row['user_picture']));
                $artist->setDetailPage($this->getArtistContentById($row['user_Id']));
                }

            return $artist;

        }catch(PDOException $e){echo $e;}
    }

    public function getAllArtists(){
        $query = "SELECT artist_Id FROM artist_content";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $artist = $this->getArtistById($row['artist_Id']);
                $allArtist[] = $artist;
            }

            return $allArtist;
        }catch (\PDOException $e){echo $e;}
    }

    //content
    public function getArtistContentById($id){
        $query = "SELECT `artist_Id`, `artist_name`, `artist_description`, `artist_discipline`, `artist_pronouns`,
       `artist_email`, `artist_soundcloud_url`, `artist_socialmedia`, `artist_stagename`, `artist_picture`,
       `artist_location` FROM `artist_content` WHERE artist_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'ArtistContent');
            return $statement->fetch();

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
            $statement = $this->content_db->prepare($query);

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
    public function getDisciplineById($id){
        $query = "SELECT `artist_discipline_Id`, `artist_discipline_name` FROM
        `artist_disciplines` WHERE artist_discipline_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'ArtistDiscipline');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllDisciplines(){
        $query = "SELECT artist_discipline_Id FROM artist_disciplines";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $discipline = $this->getDisciplineById($row['artist_discipline_Id']);
                $allDisciplines[] = $discipline;
            }

            return $allDisciplines;
        }catch (\PDOException $e){echo $e;}
    }
}