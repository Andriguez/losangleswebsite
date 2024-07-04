<?php
namespace Controllers;
use Services\EventService;

class eventsController extends Controller
{
    private EventService $eventService;
    private navbarController $navbar;
    public function __construct()
    {
        $this->navbar = new navbarController();
        $this->eventService = new EventService();
    }
    public function index($selectedYear = null, $selectedMonth = null){
        $this->navbar->displayNavbar();
        $event = $this->eventService->getEventById(2);

        $yFilters = $this->eventService->getEventsYears();
        $mFilters = $this->eventService->getEventsMonthsByYear($selectedYear);

        $selectedYear = $selectedYear ?? date('Y');
        if(isset($selectedYear)){ $selectedMonth = $selectedMonth ?? date('n'); }


        $events = $this->eventService->getAllEventsByDate($selectedYear, $selectedMonth);

        if(!empty($events)) {
            foreach ($events as $event) {
                $eLineups = $this->eventService->getAllLineupsByEvent($event->getEventId());
                if (isset($eLineups)) {
                    $event->setLineups($eLineups);
                }
            }
        }
        require __DIR__ . '/../views/events/index.php';
    }
}