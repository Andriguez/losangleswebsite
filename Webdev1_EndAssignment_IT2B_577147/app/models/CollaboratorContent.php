<?php

namespace Models;

class CollaboratorContent
{
    protected string $collaborator_jobtitle, $collaborator_socialmedia_link, $collaborator_location;

    //setters
    public function setCollaboratorTitle($title){$this->collaborator_jobtitle = $title;}
    public function setCollaboratorSocialMediaLink($link){$this->collaborator_socialmedia_link = $link;}
    public function setCollaboratorLocation($location){$this->collaborator_location = $location;}

    //getters
    public function getCollaboratorTitle():string{return $this->collaborator_jobtitle;}
    public function getCollaboratorSocialMediaLink():string{return $this->collaborator_socialmedia_link;}
    public function getCollaboratorLocation():string{return $this->collaborator_location;}
}