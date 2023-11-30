<?php

namespace models;

class ArtistDiscipline
{

    private int $artist_discipline_Id;
    private string $artist_discipline_name;

    //setters
    public function setDisciplineId($id){$this->artist_discipline_Id = $id;}
    public function setName($name){$this->artist_discipline_name = $name;}

    //getters
    public function getDisciplineId():int{return $this->artist_discipline_Id;}
    public function getName():string{return $this->artist_discipline_name;}
}