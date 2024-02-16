<?php

namespace models;

class albums_genres{
    private $pdo;

    public function __construct()
    {
        $this->pdo = \PDOFactory::getPDO();
    }

    public function getAlbumsGenres()
    {
        $stmt = $this->pdo->query('SELECT * FROM albums_genres');
        return $stmt->fetchAll();
    }

    public function getAlbumGenre($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums_genres WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createAlbumGenre($album_id, $genre_id)
    {
        $stmt = $this->pdo->prepare('INSERT INTO albums_genres (album_id, genre_id) VALUES (:album_id, :genre_id)');
        $stmt->bindParam(':album_id', $album_id, SQLITE3_INTEGER);
        $stmt->bindParam(':genre_id', $genre_id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    public function updateAlbumGenre($id, $album_id, $genre_id)
    {
        $stmt = $this->pdo->prepare('UPDATE albums_genres SET album_id = :album_id, genre_id = :genre_id WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':album_id', $album_id, SQLITE3_INTEGER);
        $stmt->bindParam(':genre_id', $genre_id, SQLITE3_INTEGER);
        $stmt->execute();

    }
}