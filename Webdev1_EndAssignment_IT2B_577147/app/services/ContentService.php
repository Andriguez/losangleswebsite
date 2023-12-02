<?php
namespace services;
use models\ContentType;
use models\DirectoryLog;
use models\MediaInfo;
use models\NavbarElement;
use models\PageContent;
use repositories\ContentRepository;
use models\Page;
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

}