<?php
namespace services;
use models\ContentType;
use models\DirectoryLog;
use models\MediaInfo;
use models\NavbarElement;
use models\PageContent;
use repositories\ContentRepository;
use models\Page;

require_once __DIR__.'/../repositories/ContentRepository.php';
class ContentService
{
    private ContentRepository $contentRepo;

    public function __construct(){
        $this->contentRepo = new ContentRepository();
    }

    public function getContentById($contentId):PageContent{
        return $this->contentRepo->getContentById($contentId);
    }
    public function getAllContent():array{
        return $this->contentRepo->getAllContent();
    }
    public function getAllContentByPageId($pageId):array{
        return $this->contentRepo->getAllContentByPageId($pageId);
    }
    public function getPageById($pageId):Page{
        return $this->contentRepo->getPageById($pageId);
    }
    public function getAllPages():array{
        return $this->contentRepo->getAllPages();
    }
    public function getNavbarContentById($contentId):NavbarElement{
        return $this->contentRepo->getNavbarContentById($contentId);
    }
    public function getAllNavbarContent():array{
        return $this->contentRepo->getAllNavbarContent();
    }
    public function getTypeById($typeId):ContentType{
        return $this->contentRepo->getTypeById($typeId);
    }
    public function getAllTypes():array{
        return $this->contentRepo->getAllTypes();
    }
    public function getMediaInfoById($mediainfoId):MediaInfo{
        return $this->contentRepo->getMediaInfoById($mediainfoId);
    }
    public function getAllMediaInfoEntries():array{
        return $this->contentRepo->getAllMediaInfoEntries();
    }
    public function getDirectoryLogById($logId):DirectoryLog{
        return $this->contentRepo->getDirectoryLogById($logId);
    }
    public function getAllDirectoryEntries():array{
        return $this->contentRepo->getAllDirectoryEntries();
    }
    public function createDirectory($type, $path, $directoryName){
        return $this->contentRepo->createDirectory($type, $path, $directoryName);
    }
    public function createMediaInfo($filename, $mediaType, $pathId){
        return $this->contentRepo->createMediaInfo($filename, $mediaType, $pathId);
    }
    public function updateContentTextByElementId($elementId, $text){
        $this->contentRepo->updateContentTextByElementId($elementId, $text);
    }
    public function updateContentPictureByElementId($elementId, $picture){
        $this->contentRepo->updateContentPictureByElementId($elementId, $picture);
    }
        public function storeAdminContent($adminId, $link, $titles, $description, $pictureId){
        $this->contentRepo->storeAdminContent($adminId, $link, $titles, $description, $pictureId);
    }
    public function deleteAdminContentByUser($userId){
        $this->contentRepo->deleteAdminContentByUserId($userId);
    }
    public function getAdminContentById($adminId){
        return $this->contentRepo->getAdminContentById($adminId);
    }
    public function deleteMediaByfileName($fileName){
        $this->contentRepo->deleteMediaEntryByName($fileName);
    }
}