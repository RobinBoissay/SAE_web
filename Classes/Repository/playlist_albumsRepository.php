<?php

namespace Repository;

use Entity\playlist_albums;
use PDOFactory;

class playlist_albumsRepository{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function findAll()
    {
        $result = $this->pdo->query('SELECT * FROM playlist_albums');
        $playlist_albums = [];
        foreach ($result as $value) {
            $playlist_albums[] = new playlist_albums($value['id'] ,$value['playlist_id'], $value['album_id']);
        }
        return $playlist_albums;
    }

    public function find($playlist_id, $album_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM playlist_albums WHERE playlist_id = :playlist_id AND album_id = :album_id');
        $stmt->bindParam(':playlist_id', $playlist_id, SQLITE3_INTEGER);
        $stmt->bindParam(':album_id', $album_id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new playlist_albums($value['id'] ,$value['playlist_id'], $value['album_id']);
    }

}