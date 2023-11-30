<?php

namespace models;

class Event
{
    private int $event_Id;
    private string $event_name, $event_description,
        $event_ticketbtn_text, $event_ticketbtn_url;
    private \DateTime $event_datetime;
    private EventLocation $event_location;
    private EventType $event_type;
    private MediaInfo $event_poster;
    private EventLineup $event_lineup;

    //setters
    public function setEventId($id){$this->event_Id = $id;}
    public function setName($name){$this->event_name = $name;}
    public function setDescription($description){$this->event_description = $description;}
    public function setTicketBtnText($text){$this->event_ticketbtn_text = $text;}
    public function setTicketUrl($url){$this->event_ticketbtn_url = $url;}
    public function setDateTime($dateTime){$this->event_datetime = $dateTime;}
    public function setLocation($location){$this->event_location = $location;}
    public function setEventType($type){$this->event_type = $type;}
    public function setEventPoster($poster){$this->event_poster = $poster;}
    public function setLineup($lineup){$this->event_lineup = $lineup;}

    //setters
    public function getEventId():int{return $this->event_Id;}
    public function getName():string{return $this->event_name;}
    public function getDescription():string{return $this->event_description;}
    public function getTicketBtnText():string{return $this->event_ticketbtn_text;}
    public function getTicketUrl():string{return $this->event_ticketbtn_url;}
    public function getDateTime():\DateTime{return $this->event_datetime;}
    public function getLocation():EventLocation{return $this->event_location;}
    public function getEventType():EventType{return $this->event_type;}
    public function getEventPoster():MediaInfo{return $this->event_poster;}
    public function getLineup():EventLineup{return $this->event_lineup;}









}