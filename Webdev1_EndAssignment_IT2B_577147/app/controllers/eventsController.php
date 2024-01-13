<?php
namespace controllers;
use services\EventService;

require __DIR__ . '/Controller.php';
require_once __DIR__.'/../services/EventService.php';


class eventsController extends Controller
{
    private EventService $eventService;
    public function __construct()
    {
        $this->eventService = new EventService();
    }
    public function index($selectedYear = null, $selectedMonth = null){
        $event = $this->eventService->getEventById(2);
        //$lineups = $this->eventService->getAllLineupsByEvent(2);

        $yFilters = $this->eventService->getEventsYears();
        $mFilters = $this->eventService->getEventsMonthsByYear($selectedYear);

        $selectedYear = $selectedYear ?? date('Y');
        if(isset($selectedYear)){ $selectedMonth = $selectedMonth ?? date('n'); }


        $events = $this->eventService->getAllEventsByDate($selectedYear, $selectedMonth);

        foreach ($events as $event){
            $eLineups = $this->eventService->getAllLineupsByEvent($event->getEventId());
            if (isset($eLineups)){
                $event->setLineups($eLineups);
            }
        }

        //echo json_encode($events);

        require __DIR__ . '/../views/events/dynamiccarousel.php';
    }
}