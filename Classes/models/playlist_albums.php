<?php

namespace models;

use PDOFactory;

class playlist_albums{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function getPlaylistsAlbums()
    {
        $stmt = $this->pdo->query('SELECT * FROM playlist_albums');
        return $stmt->fetchAll();
    }

    public function getPlaylistAlbum($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM playlist_albums WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createPlaylistAlbum($playlist_id, $album_id)
    {
        $stmt = $this->pdo->prepare('INSERT INTO playlist_albums (playlist_id, album_id) VALUES (:playlist_id, :album_id)');
        $stmt->bindParam(':playlist_id', $playlist_id, SQLITE3_INTEGER);
        $stmt->bindParam(':album_id', $album_id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    public function updatePlaylistAlbum($id, $playlist_id, $album_id)
    {
        $stmt = $this->pdo->prepare('UPDATE playlist_albums SET playlist_id = :playlist_id, album_id = :album_id WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':playlist_id', $playlist_id, SQLITE3_INTEGER);
        $stmt->bindParam(':album_id', $album_id, SQLITE3_INTEGER);
        $stmt->execute();

    }
}