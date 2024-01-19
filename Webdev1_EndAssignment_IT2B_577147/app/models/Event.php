<?php

namespace models;

use ReturnTypeWillChange;

class Event implements \JsonSerializable
{
    private int $event_Id;
    private string $event_name, $event_description,
        $event_ticketbtn_text, $event_ticketbtn_url;
    private \DateTime $event_datetime;
    private EventLocation $event_location;
    private EventType $event_type;
    private MediaInfo $event_poster;
    private string $posterSrc = "";
    private array $lineups = [];

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        return [
            'event_Id' => $this->event_Id,
            'event_name' => $this->event_name,
            'event_description' => $this->event_description,
            'event_ticketbtn_text' => $this->event_ticketbtn_text,
            'event_ticketbtn_url' => $this->event_ticketbtn_url,
            'event_location' => $this->event_location,
            'event_type' => $this->event_type,
            'posterSrc' => $this->posterSrc,
            'lineups' => $this->lineups,
            'event_datetime' => $this->event_datetime

        ];
    }

    //setters
    public function setEventId($id){$this->event_Id = $id;}
    public function setName($name){$this->event_name = $name;}
    public function setDescription($description){$this->event_description = $description;}
    public function setTicketBtnText($text){$this->event_ticketbtn_text = $text;}
    public function setTicketUrl($url){$this->event_ticketbtn_url = $url;}
    public function setDateTime($dateTime){$this->event_datetime = $dateTime;}
    public function setLocation($location){$this->event_location = $location;}
    public function setEventType($type){$this->event_type = $type;}
    public function setEventPoster($poster){
        $this->event_poster = $poster;
        if($poster->getMediaId() == 2){ $src = '/media/placeholders/picture-placeholder.png';}
            else{ $src = "/img/?p={$poster->getMediaPath()->getDirectoryName()}&i={$poster->getMediaFilename()}"; }

        $this->setPosterSrc($src);
    }
    public function setPosterSrc($src){$this->posterSrc = $src;}
    public function setLineups($lineups){$this->lineups = $lineups;}

    //setters
    public function getEventId():int{return $this->event_Id;}
    public function getName():string{return $this->event_name;}
    public function getDescription():string{return $this->event_description;}
    public function getTicketBtnText():string{return $this->event_ticketbtn_text;}
    public function getTicketUrl():string{return $this->event_ticketbtn_url;}
    public function getDateTime(){return $this->event_datetime;}
    public function getDateTimeString(){return $this->event_datetime->format('d/m/y H:i');}
    public function getLocation(){return $this->event_location;}
    public function getEventType(){return $this->event_type;}
    public function getEventPoster(){return $this->event_poster;}
    public function getPosterSrc():string{return $this->posterSrc;}
    public function getLineups(){return $this->lineups;}


}