<?php

namespace Entity;

class playlists{

    private $id;
    private $user_id;
    private $nom;

    public function __construct($id, $user_id, $nom)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->nom = $nom;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

}