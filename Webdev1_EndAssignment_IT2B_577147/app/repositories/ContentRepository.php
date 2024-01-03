<?php
namespace repositories;
use controllers\UserAuth;
use models\AdminContent;
use models\ArtistContent;
use models\ContentType;
use models\DirectoryLog;
use models\MediaInfo;
use models\Page;
use models\PageContent;

require_once __DIR__.'/../models/DirectoryLog.php';
require_once __DIR__.'/../models/Page.php';
require_once __DIR__.'/../models/PageContent.php';
require_once __DIR__.'/../models/ContentType.php';
require_once __DIR__.'/../models/MediaInfo.php';
require_once __DIR__.'/../models/NavbarElement.php';
require_once __DIR__.'/../models/AdminContent.php';
require_once __DIR__.'/../repositories/Repository.php';

class ContentRepository extends Repository
{
    //content
    public function storeAdminContent($adminId, $link, $titles, $description, $pictureId){

        $query = "INSERT INTO `admin_content` 
        (`admin_Id`, `admin_name_link`, `admin_titles`, `admin_description`, `admin_picture`)
        VALUES (:adminId, :nameLink, :titles, :description, :picture)
        ON DUPLICATE KEY UPDATE
        `admin_name_link` = VALUES(`admin_name_link`),
        `admin_titles` = VALUES(`admin_titles`),
        `admin_description` = VALUES(`admin_description`),
        `admin_picture` = VALUES(`admin_picture`)";

        try{
            if (is_null($pictureId)){
                $pictureId = 1;
            }

            $statement = $this->getContentDB()->prepare($query);
            $statement->execute(array(
                $adminId,
                $this->sanitizeText($link),
                $this->sanitizeText($titles),
                $this->sanitizeText($description),
                $pictureId
            ));
        } catch(\PDOException $e){echo $e;}
}

    public function getAdminContentById($adminId){
        $query = "SELECT `admin_name_link`, `admin_titles`, `admin_description`, `admin_picture` 
                    FROM `admin_content` WHERE `admin_Id` = :adminId";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':adminId', $adminId, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $adminContent = new AdminContent();
                $adminContent->setNameLink($row['admin_name_link']);
                $adminContent->setTitles($row['admin_titles']);
                $adminContent->setDescription($row['admin_description']);

                if (!is_null($row['admin_picture'])){
                    $adminContent->setPicture($this->getMediaInfoById($row['admin_picture']));
                }
            }

            return $adminContent ?? null;

        } catch (\PDOException $e){echo $e;}
    }
    public function getCollaboratorContentById($adminId){
    $query = "";

    try{
        $statement = $this->getContentDB()->prepare($query);
        $statement->bindParam(':adminId', $adminId, \PDO::PARAM_INT);
        $statement->execute();

        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

            $adminContent = new AdminContent();
            $adminContent->setNameLink($row['admin_name_link']);
            $adminContent->setTitles($row['admin_titles']);
            $adminContent->setDescription($row['admin_description']);
            $adminContent->setPicture($this->getMediaInfoById($row['admin_picture']));
        }

        return $adminContent ?? null;

    } catch (\PDOException $e){echo $e;}
}
    public function getContentById($id){
        $query = "SELECT `page_content_Id`, `element_Id`, `page_content_text`, `page_content_type`,
       `page_content_media`, `parent_page` FROM `page_content` WHERE page_content_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $pageContent = new PageContent();
                $pageContent->setElementId($row['page_content_Id']);
                $pageContent->setText($row['page_content_text']);
                $pageContent->setType($this->getTypeById($row['page_content_type']));
                $pageContent->setParentPage($this->getPageById($row['parent_page']));

                if (!is_null($row['page_content_media'])){
                    $pageContent->setMedia($this->getMediaInfoById($row['page_content_media']));
                }
            }

            return $pageContent;

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllContent(){
        $query = "SELECT page_content_Id FROM page_content";
        return $this->getContent($query);
    }
    public function getAllContentByPageId($pageId){
        $query = "SELECT page_content_Id FROM page_content WHERE parent_page = :pageId";
        $params = [':pageId' => $pageId];

        return $this->getContent($query, $params);
    }
    public function getContentByElementId($elementId)
    {
        $query = "SELECT page_content_Id FROM page_content WHERE `element_Id` = :elementID";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':elementID', $elementId);

            $statement->execute();

            return $this->getContentById($statement->fetchColumn());
        } catch (\PDOException $e){echo $e;}
    }

    public function updateContentTextByElementId($elementId, $textInput){
        $query = "UPDATE `page_content` SET `page_content_text`= :text WHERE `element_Id` = :elementId";

        $text = $this->sanitizeText($textInput);
        try{
            $statement = $this->getContentDB()->prepare($query);

            $statement->bindParam(':text', $text);
            $statement->bindParam(':elementId', $elementId);

            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }

    }
    private function getContent($query, $params = null) {
        try {
            $statement = $this->getContentDB()->prepare($query);

            if (isset($params)) {
                foreach ($params as $pname => $pvalue) {
                    $statement->bindParam($pname, $pvalue);
                }
            }

            $statement->execute();
            $allContent = [];

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
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
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':Id', $id);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $page = new Page();
                $page->setPageId($id);
                $page->setTitle($row['page_title']);
                $page->setDisplayname($row['page_displayname']);
                $page->setUrl($row['page_url']);
                $page->setDirectoryPath($this->getDirectoryLogById($row['page_directory']));
                $page->setInNavbar($row['page_inNavbar']);
            }

            return $page;

        }catch(PDOException $e){echo $e;}
    }

    public function getAllPages(){
        $query = "SELECT page_Id FROM pages";

        try{
            $statement = $this->getContentDB()->prepare($query);
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
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'NavbarElement');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllNavbarContent(){
        $query = "SELECT navbar_content_Id FROM navbar_content";

        try{
            $statement = $this->getContentDB()->prepare($query);
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
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $contentType = new ContentType();
                $contentType->setTypeId($row['content_type_Id']);
                $contentType->setName($row['content_type_name']);
            }

            return $contentType;

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllTypes(){
        $query = "SELECT content_type_Id FROM content_types";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $type = $this->getTypeById($row['content_type_Id']);
                $allTypes[] = $type;
            }
            return $allTypes;

        }catch (\PDOException $e){echo $e;}
    }

    //media
    public function createMediaInfo($filename, $mediaType, $pathId){
        $query = "INSERT INTO `media`(`media_filename`, `media_type`, `media_path`) VALUES (?,?,?)";

        try {
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute(array(
                $this->sanitizeText($filename),
                $this->sanitizeText($mediaType),
                $pathId,));

            return $this->getContentDB()->lastInsertId();

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
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
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $mediaInfo = $this->getMediaInfoById($row['media_Id']);
                $allMediaInfo[] = $mediaInfo;
            }

            return $allMediaInfo;
        }catch (\PDOException $e){echo $e;}
    }

    //directory logs
    public function createDirectory($type, $path){
        $query = "INSERT INTO `file_directory`(`type`, `path`) VALUES (?,?)";

        try {
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute(array(
                $this->sanitizeText($type),
                $this->sanitizeText($path),));

            return $this->getContentDB()->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getDirectoryLogById($id){
        $query = "SELECT `path_Id`, `type`, `path` FROM `file_directory` WHERE path_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $directory = new DirectoryLog();
                $directory->setPathId($row['path_Id']);
                $directory->setFiletype($row['type']);
                $directory->setPath($row['path']);
            }
                return $directory;

            } catch (\PDOException $e){echo $e;}
    }

    public function getAllDirectoryEntries(){
        $query = "SELECT path_Id FROM file_directory";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $log = $this->getDirectoryLogById($row['path_Id']);
                $directoryLogs[] = $log;
            }

            return $directoryLogs;
        }catch (\PDOException $e){echo $e;}
    }

    private function sanitizeText($input):string{
        return htmlspecialchars($input);

    }
}