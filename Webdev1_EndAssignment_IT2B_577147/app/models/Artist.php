<?php

namespace models;

class Artist extends User
{
    protected ArtistContent $artist_content;

    //constructor
    public function __construct()
    {
    }

    //setters
    public function setDetailPage($detailPage){$this->artist_content = $detailPage;}

    //getters
    public function getDetailPage():ArtistContent{return $this->artist_content;}

}