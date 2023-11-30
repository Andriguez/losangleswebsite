<?php

namespace models;

class EventLineup
{
    private int $lineup_Id;
    private Event $lineup_event;
    private Artist $lineup_artist;
    private string $lineup_non_artist_name;

    //setters
    public function setLineupId($id){$this->lineup_Id = $id;}
    public function setEvent($event){$this->lineup_event = $event;}
    public function setArtist($artist){$this->lineup_artist = $artist;}
    public function setNonArtist($artist){$this->lineup_Id = $artist;}

    //setters
    public function getLineupId():int{return $this->lineup_Id;}
    public function getEvent():Event{return $this->lineup_event;}
    public function getArtist():Artist{return $this->lineup_artist;}
    public function getNonArtist():string{return $this->lineup_Id;}

}