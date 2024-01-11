<?php
namespace repositories;
use models\Event;
use models\EventLineup;
use models\EventLocation;
use models\EventType;
use repositories\Repository;

require __DIR__.'/../models/Event.php';
require __DIR__.'/../models/EventLineup.php';
require __DIR__.'/../models/EventLocation.php';
require __DIR__.'/../models/EventType.php';
require_once __DIR__.'/../repositories/ContentRepository.php';


class EventRepository extends Repository
{
    //events
    public function storeEvent($name, $type, $datetime, $location, $description, $btnText, $btnLink, $poster, $eventId = null){
        $insertQuery = "INSERT INTO `events`(`event_name`, `event_datetime`, `event_location`, `event_type`,
                     `event_poster`, `event_description`, `event_ticketbtn_text`, `event_ticketbtn_url`)
                    VALUES (:name,:datetime,:location,:type,:poster,:description,:btntext,:btnlink)";

        $updateQuery = "UPDATE `events` SET `event_name`=:name,`event_datetime`=:datetime,
                    `event_location`=:location,`event_type`=:type,`event_poster`=:poster,
                    `event_description`=:description,`event_ticketbtn_text`=:btntext,`event_ticketbtn_url`=:btnlink 
                        WHERE `event_Id`= :id ";

        if(isset($eventId)){ $query = $updateQuery; } else { $query = $insertQuery; }

        try{
            $statement = $this->getContentDB()->prepare($query);

            $params = array(
                ':name' => $this->sanitizeText($name),
                ':datetime' => $datetime,
                ':location' => $location,
                ':type' => $type,
                ':poster' => $poster,
                ':description' => $this->sanitizeText($description),
                ':btntext' => $this->sanitizeText($btnText),
                ':btnlink' => $this->sanitizeText($btnLink),
            );

            if (isset($eventId)) {
                $params[':id'] = $eventId;
            }

            $statement->execute($params);
        } catch(\PDOException $e){echo $e;}
    }

    public function deleteEvent($eventId){
        $query = "DELETE FROM `events` WHERE event_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);

            $statement->bindParam(':id', $eventId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getEventById($id){
        $query = "SELECT `event_Id`, `event_name`, `event_datetime`, `event_location`, `event_type`, `event_poster`,
       `event_description`, `event_ticketbtn_text`, `event_ticketbtn_url`
        FROM `events` WHERE event_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $event = new Event();
                $event->setEventId($row['event_Id']);
                $event->setName($row['event_name']);
                $event->setLocation($this->getLocationById($row['event_location']));
                $event->setEventType($this->getTypeById($row['event_type']));
                $event->setDescription($row['event_description']);
                $event->setTicketBtnText($row['event_ticketbtn_text']);
                $event->setTicketUrl($row['event_ticketbtn_url']);

                $contentRepo = new ContentRepository();
                $event->setEventPoster($contentRepo->getMediaInfoById($row['event_poster']));

                $dateTime_string = $row['event_datetime'];
                $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', $dateTime_string);
                $event->setDateTime($dateTime);


            }
            return $event;
        } catch (\PDOException $e){echo $e;}

    }

    public function getAllEvents(){
        $query = "SELECT event_Id FROM events";
        return $this->getEvents($query);
    }
    public function getEventsByType($type){
        $query = "SELECT event_Id FROM events WHERE event_type = :type";
        $params = [':type', $type];

        return $this->getEvents($query, $params);
    }

    public function getEventsByDate($datetime){
        $query = "SELECT event_Id FROM events WHERE event_datetime = :datetime";
        $params = [':datetime',$datetime];

        return $this->getEvents($query,$params);
    }

    //private function getEvents2($row){
      //  while($row) {
        //    $event = $this->getEventById($row['event_Id']);
          //  $allEvents[] = $event;
        //}
        //return $allEvents;
    //}
    private function getEvents($query, $params = null) {
        try {
            $statement = $this->getContentDB()->prepare($query);

            if (isset($params)) {
                foreach ($params as $pname => $pvalue) {
                    $statement->bindParam($pname, $pvalue);}
            }

            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $event = $this->getEventById($row['event_Id']);
                $allEvents[] = $event;
            }
            return $allEvents ?? null;
        } catch (\PDOException $e){echo $e;}
    }

    public function getEventsYears(){
        $query = "SELECT DISTINCT YEAR(`event_datetime`) AS year FROM events ORDER BY year";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute();

            $years = $statement->fetchAll(\PDO::FETCH_COLUMN);

        } catch (\PDOException $e){ echo $e;}

        return $years ?? null;
    }

    public function getEventMonthsByYear($year){
        $query = "SELECT DISTINCT MONTH(`event_datetime`) AS monthId, DATE_FORMAT(`event_datetime`, '%b') AS month FROM events WHERE YEAR(`event_datetime`) = :year ORDER BY `month`;";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':year', $year, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $months[$row['monthId']] = $row['month'] ;
            }

        } catch (\PDOException $e){ echo $e;}

        return $months ?? null;
    }
    //lineups
    public function storeLineup($eventId, $category, $artists){
        $query = "INSERT INTO `event_lineups`(`lineup_event`, `lineup_category`, `lineup_artists`)
        VALUES (:event, :category, :artists)
        ON DUPLICATE KEY UPDATE           
        `lineup_event` = VALUES(`lineup_event`),
        `lineup_category` = VALUES(`lineup_category`),
        `lineup_artists` = VALUES(`lineup_artists`)";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute(array(
                ':event' => $this->sanitizeText($eventId),
                ':category' => $this->sanitizeText($category),
                ':artists' => $this->sanitizeText($artists)
            ));
        } catch(\PDOException $e){echo $e;}
    }
    public function deleteLineup($lineupId){
        $query = "DELETE FROM `event_lineups` WHERE lineup_Id = :lineupId";

        try{
            $statement = $this->getContentDB()->prepare($query);

            $statement->bindParam(':lineupId', $lineupId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getLineupById($id){
        $query = "SELECT `lineup_Id`, `lineup_event`, `lineup_category`, `lineup_artists` FROM `event_lineups` WHERE lineup_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $eventLineup = new EventLineup();
                $eventLineup->setLineupId($row['lineup_Id']);
                $eventLineup->setEvent($this->getEventById($row['lineup_event']));
                $eventLineup->setCategory($row['lineup_category']);
                $eventLineup->setArtists($row['lineup_artists']);
            }

        } catch (\PDOException $e){echo $e;}

        return $eventLineup;
    }

    public function getAllLineupsByEvent($eventId){
        $query = "SELECT `lineup_Id` FROM `event_lineups` WHERE lineup_event = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $eventId);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $lineup = $this->getLineupById($row['lineup_Id']);
                $allLineups[] = $lineup;
            }
            return $allLineups ?? null;

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllLineups(){
        $query = "SELECT lineup_Id FROM event_lineups";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $lineup = $this->getLineupById($row['lineup_Id']);
                $allLineups[] = $lineup;
            }
            return $allLineups;

        }catch (\PDOException $e){echo $e;}
    }

    //locations
    public function storeLocation($name, $address, $city, $country, $mapURL){
        $query = "INSERT INTO `event_locations`(`location_name`, `location_address`, `location_city`, `location_country`,
        `location_map_url`)
        VALUES (:name, :address, :city, :country,:mapUrl)
        ON DUPLICATE KEY UPDATE           
        `location_name` = VALUES(`location_name`),
        `location_address` = VALUES(`location_address`),
        `location_city` = VALUES(`location_city`),
        `location_country` = VALUES(`location_country`),
        `location_map_url` = VALUES(`location_map_url`)";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute(array(
                ':name' => $this->sanitizeText($name),
                ':address' => $this->sanitizeText($address),
                ':city' => $this->sanitizeText($city),
                ':country' => $this->sanitizeText($country),
                ':mapUrl' => $this->sanitizeText($mapURL)
            ));
        } catch(\PDOException $e){echo $e;}
    }
    public function deleteLocation($locationId){
        $query = "DELETE FROM `event_locations` WHERE location_Id = :locationId";

        try{
            $statement = $this->getContentDB()->prepare($query);

            $statement->bindParam(':locationId', $locationId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getLocationById($id){
        $query = "SELECT `location_Id`, `location_name`, `location_address`, `location_city`, `location_country`,
        `location_map_url` FROM `event_locations` WHERE location_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id, \PDO::PARAM_INT);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $eventLocation = new EventLocation();
                $eventLocation->setLocationId($row['location_Id']);
                $eventLocation->setName($row['location_name']);
                $eventLocation->setAddress($row['location_address']);
                $eventLocation->setCity($row['location_city']);
                $eventLocation->setCountry($row['location_country']);
                $eventLocation->setMap($row['location_map_url']);
            }

        } catch (\PDOException $e){echo $e;}

        return $eventLocation;
    }

    public function getAllLocations(){
        $query = "SELECT location_Id FROM event_locations";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch()) {

                $location = $this->getLocationById($row['location_Id']);
                $allLocations[] = $location;
            }

        }catch (\PDOException $e){echo $e;}
        return $allLocations ?? null;
    }

    //types
    public function createEventType($name){
        $query = "INSERT INTO `event_types`(`event_type_name`) VALUES (?)";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute([$this->sanitizeText($name)]);

        } catch (\PDOException $e){
            echo $e;
        }
    }
    public function deleteEventType($typeId){
        $query = "DELETE FROM `event_types` WHERE event_type_Id = :typeId";

        try{
            $statement = $this->getContentDB()->prepare($query);

            $statement->bindParam(':typeId', $typeId, \PDO::PARAM_INT);
            $statement->execute();

        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
    public function getTypeById($id){
        $query = "SELECT `event_type_Id`, `event_type_name` FROM `event_types` WHERE event_type_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $eventType = new EventType();
                $eventType->setTypeId($row['event_type_Id']);
                $eventType->setTypeName($row['event_type_name']);
            }

        } catch (\PDOException $e){echo $e;}

        return $eventType;
    }

    public function getAllTypes(){
        $query = "SELECT event_type_Id FROM event_types";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->execute();

            while($row = $statement->fetch()) {

                $type = $this->getTypeById($row['event_type_Id']);
                $allTypes[] = $type;
            }
        }catch (\PDOException $e){echo $e;}

        return $allTypes ?? null;
    }

    private function sanitizeText($input):string{
        return htmlspecialchars($input);

    }
}