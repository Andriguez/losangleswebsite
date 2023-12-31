<?php

namespace models;

class Collaborator extends User
{
    private ?CollaboratorContent $collaboratorContent;
    //constructor
    public function __construct()
    {
    }

    //setters
    public function setCollaboratorContent($content){$this->collaboratorContent = $content;}

    //getters
    public function getCollaboratorContent():CollaboratorContent{return $this->collaboratorContent;}

}