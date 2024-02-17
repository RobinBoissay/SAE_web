<?php

namespace Entity;


class albums{

    private $id;
    private $titre;
    private $annee;
    private $artiste_id;
    private $image;

    public function __construct($id, $titre, $annee, $artiste_id, $image)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->annee = $annee;
        $this->artiste_id = $artiste_id;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getAnnee()
    {
        return $this->annee;
    }

    public function getArtiste_id()
    {
        return $this->artiste_id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    public function setArtiste_id($artiste_id)
    {
        $this->artiste_id = $artiste_id;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

}