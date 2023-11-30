<?php

namespace models;

class Artist extends User
{
    protected ArtistDiscipline $artist_discipline;
    protected string $artist_stage_name, $artist_location;
    protected ArtistContent $artist_content;

    //constructor
    public function __construct()
    {
    }

    //setters
    public function setDiscipline($discipline){$this->artist_discipline = $discipline;}
    public function setStageName($stagename){$this->artist_stage_name = $stagename;}
    public function setLocation($location){$this->artist_location = $location;}
    public function setDetailPage($detailPage){$this->artist_content = $detailPage;}

    //getters
    public function getDiscipline():ArtistDiscipline{return $this->artist_discipline;}
    public function getStageName():string{return $this->artist_stage_name;}
    public function getLocation():string{return $this->artist_location;}
    public function getDetailPage():int{return $this->artist_content;}

}