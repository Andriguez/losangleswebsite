<?php
namespace repositories;
use models\MediaInfo;
use models\Page;
require_once __DIR__.'/../models/DirectoryLog.php';
require_once __DIR__.'/../models/Page.php';
require_once __DIR__.'/../models/PageContent.php';
require_once __DIR__.'/../models/ContentType.php';
require_once __DIR__.'/../models/MediaInfo.php';
require_once __DIR__.'/../models/NavbarElement.php';

class ContentRepository extends Repository
{
    //content
    public function getContentById($id){
        $query = "SELECT `page_content_Id`, `page_content_name`, `page_content_text`, `page_content_type`,
       `page_content_media`, `parent_page` FROM `page_content` WHERE page_content_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'PageContent');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllContent(){
        $query = "SELECT page_content_Id FROM page_content";
        return $this->getContent($query);
    }
    public function getAllContentByPageId($pageId){
        $query = "SELECT page_content_Id FROM page_content WHERE parent_page = :pageId";
        $params = [':pageId', $pageId];

        return $this->getContent($query, $params);
    }

    private function getContent($query, $params = null) {
        try {
            $statement = $this->content_db->prepare($query);

            if (isset($params)) {
                foreach ($params as $pname => $pvalue) {
                    $statement->bindParam($pname, $pvalue);
                }
            }

            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $content = $this->getContentById($row['page_content_Id']);
                $allContent[] = $content;
            }
            return $allContent;
        } catch (\PDOException $e){echo $e;}
    }


    //pages
    public function getPageById(int $id){
        $query = "SELECT `page_title`, `page_displayname`, `page_url`,
       `page_directory`, `page_inNavbar` FROM `pages` WHERE page_Id = :Id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':Id', $id);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $page = new Page();
                $page->setPageId($id);
                $page->setTitle($row['page_title']);
                $page->setDisplayname($row['page_displayname']);
                $page->setUrl($row['page_url']);
                $page->setDirectoryPath($this->getLogById($row['page_directory']));
                $page->setInNavbar($row['page_inNavbar']);
                $page->setContent($this->getAllContentByPageId($id));
            }

            return $page;

        }catch(PDOException $e){echo $e;}
    }

    public function getAllPages(){
        $query = "SELECT page_Id FROM pages";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $page = $this->getPageById($row['page_Id']);
                $allPages[] = $page;
            }
            return $allPages;

        }catch (\PDOException $e){echo $e;}
    }

    //navbar Content
    public function getNavbarContentById($id){
        $query = "SELECT `navbar_content_Id`, `navbar_content_type`, `navbar_content_media`, `navbar_content_page`,
       `navbar_content_text`, `navbar_content_url` FROM `navbar_content` WHERE navbar_content_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'NavbarElement');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllNavbarContent(){
        $query = "SELECT navbar_content_Id FROM navbar_content";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $content = $this->getNavbarContentById($row['navbar_content_Id']);
                $allContent[] = $content;
            }
            return $allContent;

        }catch (\PDOException $e){echo $e;}
    }

    //types
    public function getTypeById($id){
        $query = "SELECT `content_type_Id`, `content_type_name` FROM `content_types` WHERE content_type_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'ContentType');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllTypes(){
        $query = "SELECT content_type_Id FROM content_types";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $type = $this->getTypeById($row['content_type_Id']);
                $allTypes[] = $type;
            }
            return $allTypes;

        }catch (\PDOException $e){echo $e;}
    }

    //media
    public function getMediaInfoById($id){
        $query = "SELECT media_Id, media_filename, media_type, media_path FROM media WHERE media_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $mediaInfo = new MediaInfo();
                $mediaInfo->setMediaId($row['media_Id']);
                $mediaInfo->setMediaFilename($row['media_filename']);
                $mediaInfo->setMediaType($row['media_type']);
                $mediaInfo->setMediaPath($this->getDirectoryLogById($row['media_path']));
            }

            return $mediaInfo;
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

    //directory logs
    public function getDirectoryLogById($id){
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

                $log = $this->getDirectoryLogById($row['path_Id']);
                $directoryLogs[] = $log;
            }

            return $directoryLogs;
        }catch (\PDOException $e){echo $e;}
    }
}