<?php

namespace Entity;


class notes{

    private $id;
    private $utilisateur_id;
    private $album_id;
    private $note;

    public function __construct($id, $utilisateur_id, $album_id, $note)
    {
        $this->id = $id;
        $this->utilisateur_id = $utilisateur_id;
        $this->album_id = $album_id;
        $this->note = $note;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUtilisateur_id()
    {
        return $this->utilisateur_id;
    }

    public function getAlbum_id()
    {
        return $this->album_id;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;
    }

    public function setAlbum_id($album_id)
    {
        $this->album_id = $album_id;
    }

    public function setNote($note)
    {
        $this->note = $note;
    }
    

}