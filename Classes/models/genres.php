<?php

namespace models;

use PDOFactory;

class genres{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function getGenres()
    {
        $stmt = $this->pdo->query('SELECT * FROM genres');
        return $stmt->fetchAll();
    }

    public function getGenre($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM genres WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createGenre($nom)
    {
        $stmt = $this->pdo->prepare('INSERT INTO genres (nom) VALUES (:nom)');
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function updateGenre($id, $nom)
    {
        $stmt = $this->pdo->prepare('UPDATE genres SET nom = :nom WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->execute();

    }
}