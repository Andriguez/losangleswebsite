<?php

namespace models;

class ArtistContent
{
    private string $artist_stagename, $artist_extralink, $artist_email,
        $artist_location, $artist_description, $artist_socialmedia, $artist_soundcloud_url;
    private ArtistDiscipline $artist_discipline;
    private MediaInfo $artist_picture;


    //setters
    public function setStagename($stagename){$this->artist_stagename = $stagename;}
    public function setExtraLink($extralink){$this->artist_extralink = $extralink;}
    public function setEmail($email){$this->artist_email = $email;}
    public function setLocation($location){$this->artist_location = $location;}
    public function setDescription($description){$this->artist_description = $description;}
    public function setSocials($socials){$this->artist_socialmedia = $socials;}
    public function setSoundcloudUrl($url){$this->artist_soundcloud_url = $url;}
    public function setDiscipline($discipline){$this->artist_discipline = $discipline;}
    public function setPicture($media){$this->artist_picture = $media;}

    //getters
    public function getStagename():string{return $this->artist_stagename;}
    public function getExtraLink():string{return $this->artist_extralink;}
    public function getEmail():string{return $this->artist_email;}
    public function getLocation():string{return $this->artist_location;}
    public function getDescription():string{return $this->artist_description;}
    public function getSocials():string{return $this->artist_socialmedia;}
    public function getSoundcloudUrl():string{return $this->artist_soundcloud_url;}
    public function getDiscipline(){return $this->artist_discipline;}
    public function getPicture(){return $this->artist_picture;}
    public function getPictureSrc():string{
        if($this->getPicture()->getMediaId() === 1){
            return '/media/placeholders/user-picture-placeholder.png';
        }
        return "/img/?p={$this->getPicture()->getMediaPath()->getDirectoryName()}&i={$this->getPicture()->getMediaFilename()}";
    }


}