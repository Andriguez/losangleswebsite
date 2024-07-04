<?php

namespace Models;

use ReturnTypeWillChange;

class EventLineup implements \JsonSerializable
{
    private int $lineup_Id;
    private Event $lineup_event;
    private array $lineup_artists;
    private string $lineup_category;

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        return [
            'lineup_Id' => $this->lineup_Id,
            'artists' => $this->lineup_artists,
            'category' => $this->lineup_category,

        ];    }

    //setters
    public function setLineupId($id){   $this->lineup_Id = $id;}
    public function setEvent($event){   $this->lineup_event = $event;}
    public function setCategory($category){ $this->lineup_category = $category;}
    public function setArtists($artists){
        $artistsArray = explode(';', $artists);
        $this->lineup_artists = $artistsArray;  }

    //setters
    public function getLineupId(){  return $this->lineup_Id;}
    public function getEvent(){    return $this->lineup_event;}
    public function getArtists(){   return $this->lineup_artists;}
    public function getCategory(){  return $this->lineup_category;}


}