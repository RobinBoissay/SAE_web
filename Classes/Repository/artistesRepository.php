<?php

namespace Repository;

use Entity\artistes;
use PDOFactory;

class artistesRepository{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function findAll()
    {
        $result = $this->pdo->query('SELECT * FROM artistes');
        $artistes = [];
        foreach ($result as $value) {
            $artistes[] = new artistes($value['id'], $value['nom']);
        }
        return $artistes;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM artistes WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new artistes($value['id'], $value['nom']);
    }

    public function find3RandomArtistes()
    {
        $result = $this->pdo->query('SELECT * FROM artistes ORDER BY RANDOM() LIMIT 3');
        $artistes = [];
        foreach ($result as $value) {
            $artistes[] = new artistes($value['id'], $value['nom']);
        }
        return $artistes;
    }

    public function countArtistes()
    {
        $stmt = $this->pdo->query('SELECT COUNT(*) FROM artistes');
        return $stmt->fetchColumn();
    }

    public function create($nom)
    {
        $stmt = $this->pdo->prepare('INSERT INTO artistes (nom) VALUES (:nom)');
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function update($id, $nom)
    {
        $stmt = $this->pdo->prepare('UPDATE artistes SET nom = :nom WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM artistes WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
    }

}