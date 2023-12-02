<?php
namespace services;
use models\Event;
use models\EventLineup;
use models\EventLocation;
use models\EventType;
use repositories\EventRepository;
class EventService
{
    private EventRepository $eventRepo;

    public function __construct(){
        $this->eventRepo = new EventRepository();
    }

    public function getEventById($eventId):Event{
        return $this->eventRepo->getEventById($eventId);
    }
    public function getAllEvents():array{
        return $this->eventRepo->getAllEvents();
    }
    public function getAllEventsByType($eventType):array{
        return $this->eventRepo->getEventsByType($eventType);
    }
    public function getAllEventsByDate($datetime):array{
        return $this->eventRepo->getEventsByDate($datetime);
    }
    public function getLineupById($lineupId):EventLineup{
        return $this->eventRepo->getLineupById($lineupId);
    }
    public function getLineupByEvent($eventId):EventLineup{
        return $this->eventRepo->getLineupByEvent($eventId);
    }
    public function getAllLineups():array{
        return $this->eventRepo->getAllLineups();
    }
    public function getLocationById($locationId):EventLocation{
        return $this->eventRepo->getLocationById($locationId);
    }
    public function getAllLocations():array{
        return $this->eventRepo->getAllLocations();
    }
    public function getTypeById($typeId):EventType{
        return $this->eventRepo->getTypeById($typeId);
    }
    public function getAllTypes():array{
        return $this->eventRepo->getAllTypes();
    }
}