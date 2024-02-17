<?php

namespace Entity;


class playlist_albums{

    private $id;
    private $playlist_id;
    private $album_id;

    public function __construct($id, $playlist_id, $album_id)
    {
        $this->id = $id;
        $this->playlist_id = $playlist_id;
        $this->album_id = $album_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPlaylist_id()
    {
        return $this->playlist_id;
    }

    public function getAlbum_id()
    {
        return $this->album_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPlaylist_id($playlist_id)
    {
        $this->playlist_id = $playlist_id;
    }

    public function setAlbum_id($album_id)
    {
        $this->album_id = $album_id;
    }

}