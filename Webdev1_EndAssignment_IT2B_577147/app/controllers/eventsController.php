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

    public function index($selectedYear = null, $selectedMonth = null)
    {

        if (isset($selectedYear)) {
            $selectedYear = (int)$selectedYear;
            if (strlen($selectedYear) != 4) {
                $this->errorHandler(400, 'The event input is not correct');
                return;
            }

            if (isset($selectedMonth)) {
                $selectedMonth = (int)$selectedMonth;
                // Check if selectedMonth is a valid number between 1 and 12
                if (!filter_var($selectedMonth, FILTER_VALIDATE_INT) || (int)$selectedMonth < 1 || (int)$selectedMonth > 12) {
                    $this->errorHandler(400, 'The event input is not correct');
                    return;
                }
            }

        }
        $this->navbar->displayNavbar();
        //$event = $this->eventService->getEventById(2);

        $yFilters = $this->eventService->getEventsYears();
        $mFilters = $this->eventService->getEventsMonthsByYear($selectedYear);

        $selectedYear = $selectedYear ?? date('Y');
        if (isset($selectedYear)) {
            $selectedMonth = $selectedMonth ?? date('n');
        }


        $events = $this->eventService->getAllEventsByDate($selectedYear, $selectedMonth);

        if (!empty($events)) {
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