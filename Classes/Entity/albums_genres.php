<?php

namespace Entity;

class albums_genres{

    private $id;
    private $album_id;
    private $genre_id;

    public function __construct($id, $album_id, $genre_id)
    {
        $this->id = $id;
        $this->album_id = $album_id;
        $this->genre_id = $genre_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAlbum_id()
    {
        return $this->album_id;
    }

    public function getGenre_id()
    {
        return $this->genre_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAlbum_id($album_id)
    {
        $this->album_id = $album_id;
    }

    public function setGenre_id($genre_id)
    {
        $this->genre_id = $genre_id;
    }

    




}