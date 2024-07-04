<?php
namespace Services;
use Models\EventType;
use Repositories\EventRepository;

class EventService
{
    private EventRepository $eventRepo;

    public function __construct(){
        $this->eventRepo = new EventRepository();
    }

    public function storeEvent($name, $type, $datetime, $location, $description, $btnText, $btnLink, $poster, $eventId = null){
        $this->eventRepo->storeEvent($name, $type, $datetime, $location, $description,$btnText, $btnLink, $poster, $eventId);
    }
    public function deleteEvent($eventId){
        $this->eventRepo->deleteEvent($eventId);
    }
    public function getEventById($eventId){ return $this->eventRepo->getEventById($eventId); }
    public function getAllEvents(){ return $this->eventRepo->getAllEvents(); }
    public function getAllEventsByType($eventType){ return $this->eventRepo->getEventsByType($eventType); }
    public function getAllEventsByDate($year, $month){ return $this->eventRepo->getEventsByDate($year, $month); }
    public function getEventsYears(){ return $this->eventRepo->getEventsYears(); }
    public function getEventsMonthsByYear($year){ return $this->eventRepo->getEventMonthsByYear($year); }
    public function storeLineup($event, $category, $artists){ $this->eventRepo->storeLineup($event, $category, $artists); }
    public function deleteLineup($lineupId){ $this->eventRepo->deleteLineup($lineupId); }
    public function getLineupById($lineupId){ return $this->eventRepo->getLineupById($lineupId); }
    public function getAllLineupsByEvent($eventId){ return $this->eventRepo->getAllLineupsByEvent($eventId); }
    public function getAllLineups(){ return $this->eventRepo->getAllLineups(); }
    public function storeLocation($name, $address, $city, $country, $mapURL){ $this->eventRepo->storeLocation($name, $address, $city, $country, $mapURL);}
    public function deleteLocation($locationId){ $this->eventRepo->deleteLocation($locationId);}
    public function getLocationById($locationId){ return $this->eventRepo->getLocationById($locationId); }
    public function getAllLocations(){ return $this->eventRepo->getAllLocations(); }
    public function getTypeById($typeId):EventType{ return $this->eventRepo->getTypeById($typeId); }
    public function getAllTypes(){ return $this->eventRepo->getAllTypes(); }
    public function createEventType($name){ $this->eventRepo->createEventType($name); }
    public function deleteEventType($typeId){ $this->eventRepo->deleteEventType($typeId); }
}