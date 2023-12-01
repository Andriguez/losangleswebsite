<?php
namespace repositories;
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
        FROM `event_page_content` WHERE event_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'Event');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllEvents(){
        $query = "SELECT event_Id FROM event_page_content";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            return $this->getEvents($statement->fetch(\PDO::FETCH_ASSOC));

        }catch (\PDOException $e){echo $e;}
    }
    public function getEventsByType($type){
        $query = "SELECT event_Id FROM event_page_content WHERE event_type = :type";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':type', $type);
            $statement->execute();

            return $this->getEvents($statement->fetch(\PDO::FETCH_ASSOC));

        }catch (\PDOException $e){echo $e;}
    }

    public function getEventsByDate($datetime){
        $query = "SELECT event_Id FROM event_page_content WHERE event_datetime = :datetime";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':datetime', $datetime);
            $statement->execute();

            $params[$name,$value] = [':datetime',$datetime];

            return $this->getEvents($this->content_db->prepare($query),);

        }catch (\PDOException $e){echo $e;}
    }

    //private function getEvents2($row){
      //  while($row) {
        //    $event = $this->getEventById($row['event_Id']);
          //  $allEvents[] = $event;
        //}
        //return $allEvents;
    //}
    private function getEvents($statement, $params) {
        $count = 0;

        foreach ($params as $p){
            $statement->bindParam("$count", $p);
            $count++;
        }

        $statement->execute();

        while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $event = $this->getEventById($row['event_Id']);
            $allEvents[] = $event;
        }
        return $allEvents;
    }

    //lineups
    public function getLineupById($id){
        $query = "SELECT `lineup_Id`, `lineup_event`, `lineup_artist`,
       `non_artist_name` FROM `event_lineup` WHERE lineup_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'EventLineup');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllLineups(){
        $query = "SELECT lineup_Id FROM event_lineup";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $lineup = $this->getLineupById($row['lineup_Id']);
                $allLineups[] = $lineup;
            }
            return $allLineups;

        }catch (\PDOException $e){echo $e;}
    }

    //locations
    public function getLocationById($id){
        $query = "SELECT `location_Id`, `location_name`, `location_address`, `location_city`, `location_country`,
       `location_website`, `location_map_url` FROM `event_location` WHERE location_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'EventLocation');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllLocations(){
        $query = "SELECT location_Id FROM event_location";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $location = $this->getLocationById($row['location_Id']);
                $allLocations[] = $location;
            }
            return $allLocations;

        }catch (\PDOException $e){echo $e;}
    }

    //type
    public function getTypeById($id){
        $query = "SELECT `event_type_Id`, `event_type_name` FROM `event_type` WHERE event_type_Id = :id";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();

            $statement->setFetchMode(\PDO::FETCH_CLASS, 'EventType');
            return $statement->fetch();

        } catch (\PDOException $e){echo $e;}
    }

    public function getAllTypes(){
        $query = "SELECT event_type_Id FROM event_type";

        try{
            $statement = $this->content_db->prepare($query);
            $statement->execute();

            while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {

                $type = $this->getTypeById($row['event_type_Id']);
                $allTypes[] = $type;
            }
            return $allTypes;

        }catch (\PDOException $e){echo $e;}
    }
}