<?php
namespace repositories;
require __DIR__.'/../models/DirectoryLog.php';

class DirectoryRepository extends Repository
{
    public function getLogById($id){
        $query = "SELECT `path_Id`, `filename`, `filetype`, `path` FROM `file_directory` WHERE path_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'DirectoryLog');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllDirectoryEntries(){
        $query = "SELECT path_Id FROM file_directory";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $log = $this->getLogById($row['path_Id']);
                $directoryLogs[] = $log;
            }

            return $directoryLogs;
        }catch (\PDOException $e){echo $e;}
    }
}