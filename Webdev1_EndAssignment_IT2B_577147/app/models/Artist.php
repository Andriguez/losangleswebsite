<?php

namespace models;

class Artist extends User
{
    protected ?ArtistContent $artist_content;

    //constructor
    public function __construct()
    {
    }

    //setters
    public function setArtistContent($artistContent){$this->artist_content = $artistContent;}

    //getters
    public function getArtistContent(){return $this->artist_content;}

}