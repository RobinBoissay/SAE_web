<?php

namespace Entity;

class albums_genres{

    private $album_id;
    private $genre_id;

    public function __construct($album_id, $genre_id)
    {
        $this->album_id = $album_id;
        $this->genre_id = $genre_id;
    }

    public function getAlbum_id()
    {
        return $this->album_id;
    }

    public function getGenre_id()
    {
        return $this->genre_id;
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