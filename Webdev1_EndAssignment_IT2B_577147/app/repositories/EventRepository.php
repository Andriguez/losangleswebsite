<?php
namespace repositories;
use models\EventLocation;
use models\EventType;

require __DIR__.'/../models/Event.php';
require __DIR__.'/../models/EventLineup.php';
require __DIR__.'/../models/EventLocation.php';
require __DIR__.'/../models/EventType.php';

class EventRepository extends Repository
{
    //events
    public function getEventById($id){
        $query = "SELECT `event_Id`, `event_name`, `event_datetime`, `event_location`, `event_type`, `event_poster`,
       `event_lineup`, `event_description`, `event_ticketbtn_text`, `event_ticketbtn_url`
        FROM `events` WHERE event_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'Event');
            return $statement->fetch();

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

    //lineups
    public function getLineupById($id){
        $query = "SELECT `lineup_Id`, `lineup_event`, `lineup_artist`,
       `non_artist_name` FROM `event_lineups` WHERE lineup_Id = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'EventLineup');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getLineupByEvent($id){
        $query = "SELECT `lineup_Id`, `lineup_event`, `lineup_artist`,
       `non_artist_name` FROM `event_lineups` WHERE lineup_event = :id";

        try{
            $statement = $this->getContentDB()->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'EventLineup');
            return $statement->fetch();

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