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
    public function index(){
        $event = $this->eventService->getEventById(2);
        $lineups = $this->eventService->getAllLineupsByEvent(2);

        require __DIR__ . '/../views/events/newcarousel.php';
    }
}