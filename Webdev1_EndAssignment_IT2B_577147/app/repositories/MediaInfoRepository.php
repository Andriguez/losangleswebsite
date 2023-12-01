<?php
namespace repositories;
require __DIR__.'/../models/MediaInfo.php';
class MediaInfoRepository extends Repository
{
    public function getMediaInfoById($id){
        $query = "SELECT media_Id, media_filename, media_type, media_path FROM media WHERE media_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'MediaInfo');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllMediaInfoEntries(){
        $query = "SELECT media_Id FROM media";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $mediaInfo = $this->getMediaInfoById($row['media_Id']);
                $allMediaInfo[] = $mediaInfo;
            }

            return $allMediaInfo;
        }catch (\PDOException $e){echo $e;}
    }
}