<?php

namespace models;

use PDOFactory;

class playlists{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function getPlaylists()
    {
        $stmt = $this->pdo->query('SELECT * FROM playlists');
        return $stmt->fetchAll();
    }

    public function getPlaylist($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM playlists WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createPlaylist($nom)
    {
        $stmt = $this->pdo->prepare('INSERT INTO playlists (nom) VALUES (:nom)');
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function updatePlaylist($id, $nom)
    {
        $stmt = $this->pdo->prepare('UPDATE playlists SET nom = :nom WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->execute();

    }
}