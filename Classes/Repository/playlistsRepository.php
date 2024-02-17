<?php

namespace Repository;

use Entity\playlists;
use PDOFactory;

class playlistsRepository{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function findAll()
    {
        $result = $this->pdo->query('SELECT * FROM playlists');
        $playlists = [];
        foreach ($result as $value) {
            $playlists[] = new playlists($value['id'], $value['user_id'], $value['nom']);
        }
        return $playlists;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM playlists WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new playlists($value['id'], $value['user_id'], $value['nom']);
    }

}