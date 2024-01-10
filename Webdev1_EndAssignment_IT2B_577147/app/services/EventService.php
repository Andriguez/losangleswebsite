<?php
namespace services;
use models\Event;
use models\EventLineup;
use models\EventLocation;
use models\EventType;
use repositories\EventRepository;
require_once __DIR__ . '/../repositories/EventRepository.php';
class EventService
{
    private EventRepository $eventRepo;

    public function __construct(){
        $this->eventRepo = new EventRepository();
    }

    public function getEventById($eventId){ return $this->eventRepo->getEventById($eventId); }
    public function getAllEvents(){ return $this->eventRepo->getAllEvents(); }
    public function getAllEventsByType($eventType){ return $this->eventRepo->getEventsByType($eventType); }
    public function getAllEventsByDate($datetime){ return $this->eventRepo->getEventsByDate($datetime); }
    public function getLineupById($lineupId):EventLineup{ return $this->eventRepo->getLineupById($lineupId); }
    public function getLineupByEvent($eventId):EventLineup{ return $this->eventRepo->getLineupByEvent($eventId); }
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