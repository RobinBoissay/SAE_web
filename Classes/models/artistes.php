<?php

namespace models;

use PDOFactory;

class artistes{

    private $pdo;

    public function __construct()
    {
        $this->pdo =  PDOFactory::getPDO();
    }

    public function getArtistes()
    {
        $stmt = $this->pdo->query('SELECT * FROM artistes');
        return $stmt->fetchAll();
    }

    public function getArtiste($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM artistes WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createArtiste($nom, $prenom)
    {
        $stmt = $this->pdo->prepare('INSERT INTO artistes (nom, prenom) VALUES (:nom, :prenom)');
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->bindParam(':prenom', $prenom, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function updateArtiste($id, $nom, $prenom)
    {
        $stmt = $this->pdo->prepare('UPDATE artistes SET nom = :nom, prenom = :prenom WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->bindParam(':prenom', $prenom, SQLITE3_TEXT);
        $stmt->execute();

    }
}