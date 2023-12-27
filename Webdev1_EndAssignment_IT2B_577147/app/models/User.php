<?php

namespace models;
use JsonSerializable;
use ReturnTypeWillChange;

class User implements JsonSerializable
{
    protected int $user_Id;
    protected string $user_firstname, $user_lastname, $user_email, $user_pronouns, $user_password;
    protected ?MediaInfo $user_picture = null;
    protected UserType $user_type;
    //setter
    public function setUserId(int $Id){$this->user_Id = $Id;}
    public function setFirstName(string $firstname){$this->user_firstname = $firstname;}
    public function setLastName(string $lastname){$this->user_lastname = $lastname;}
    public function setEmail(string $email){$this->user_email = $email;}
    public function setPronouns(string $pronouns){$this->user_pronouns = $pronouns;}
    public function setPassword(string $password){$this->user_password = $password;}
    public function setMediaInfo(MediaInfo $media){$this->user_picture = $media;}
    public function setUserType(UserType $type){$this->user_type = $type;}

    #[ReturnTypeWillChange]
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }

    //getters
    public function getUserId():int{return $this->user_Id;}
    public function getFirstName():string{return $this->user_firstname;}
    public function getLastName():string{return $this->user_lastname;}
    public function getEmail():string{return $this->user_email;}
    public function getPronouns():string{return $this->user_pronouns;}
    public function getPassword():string{return $this->user_password;}
    public function getMediaInfo():MediaInfo{return $this->user_picture;}
    public function getUserType():UserType{return $this->user_type;}
    public function getPictureSrc():string{return $this->getMediaInfo()->getMediaPath()->getPath().$this->getMediaInfo()->getMediaFilename();}

    //constructor
    public function __construct(){

    }
}