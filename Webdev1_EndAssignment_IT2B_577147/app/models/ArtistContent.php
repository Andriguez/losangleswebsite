<?php

namespace models;

class ArtistContent
{
    private Artist $artist_Id;
    private string $artist_name, $artist_stagename, $artist_pronouns, $artist_email,
        $artist_location, $artist_description, $artist_socialmedia, $artist_soundcloud_url;
    private ArtistDiscipline $artist_discipline;
    private MediaInfo $artist_picture;


    //setters
    public function setArtist($artist){$this->artist_Id = $artist;}
    public function setName($name){$this->artist_name = $name;}
    public function setStagename($stagename){$this->artist_stagename = $stagename;}
    public function setPronouns($pronouns){$this->artist_pronouns = $pronouns;}
    public function setEmail($email){$this->artist_email = $email;}
    public function setLocation($location){$this->artist_location = $location;}
    public function setDescription($description){$this->artist_description = $description;}
    public function setSocials($socials){$this->artist_socialmedia = $socials;}
    public function setSoundcloudUrl($url){$this->artist_soundcloud_url = $url;}
    public function setDiscipline($discipline){$this->artist_discipline = $discipline;}
    public function setPicture($media){$this->artist_picture = $media;}

    //getters
    public function getArtist():Artist{return $this->artist_Id;}
    public function getName():string{return $this->artist_name;}
    public function getStagename():string{return $this->artist_stagename;}
    public function getPronouns():string{return $this->artist_pronouns;}
    public function getEmail():string{return $this->artist_email;}
    public function getLocation():string{return $this->artist_location;}
    public function getDescription():string{return $this->artist_description;}
    public function getSocials():string{return $this->artist_socialmedia;}
    public function getSoundcloudUrl():string{return $this->artist_soundcloud_url;}
    public function getDiscipline():ArtistDiscipline{return $this->artist_discipline;}
    public function getPicture():MediaInfo{return $this->artist_picture;}

}