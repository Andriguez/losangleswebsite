<?php

namespace models;

use ReturnTypeWillChange;

class EventLocation implements \JsonSerializable
{
    private int $location_Id;
    private string $location_name, $location_address, $location_city,$location_country, $location_map_url;

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        return [
            'location_Id' => $this->location_Id,
            'location_name' => $this->location_name,
            'location_city' => $this->location_city,
            'location_map_url' => $this->location_map_url,
        ];
    }

    //setters
    public function setLocationId($id){$this->location_Id = $id;}
    public function setName($name){$this->location_name = $name;}
    public function setAddress($address){$this->location_address = $address;}
    public function setCity($city){$this->location_city = $city;}
    public function setCountry($country){$this->location_country = $country;}
    public function setMap($url){$this->location_map_url = $url;}

    //setters
    public function getLocationId():string{return $this->location_Id;}
    public function getName():string{return $this->location_name;}
    public function getAddress():string{return $this->location_address;}
    public function getCity():string{return$this->location_city;}
    public function getCountry():string{return $this->location_country;}
    public function getMap():string{return $this->location_map_url;}

}