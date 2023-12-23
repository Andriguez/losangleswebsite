<?php

namespace models;

class Collaborator extends User
{
    protected CollaboratorContent $collaborator_content;

    //constructor
    public function __construct()
    {
    }

    //setters
    public function setCollaboratorInfo($info){$this->collaborator_content = $info;}

    //getters
    public function getCollaboratorInfo():ArtistContent{return $this->collaborator_content;}

}