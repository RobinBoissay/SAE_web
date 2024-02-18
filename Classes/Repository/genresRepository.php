<?php 

namespace Repository;

use Entity\genres;
use PDOFactory;

class genresRepository{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function findAll()
    {
        $result = $this->pdo->query('SELECT * FROM genres');
        $genres = [];
        foreach ($result as $value) {
            $genres[] = new genres($value['id'], $value['nom']);
        }
        return $genres;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM genres WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new genres($value['id'], $value['nom']);
    }

    public function find3randomGenres()
    {
        $result = $this->pdo->query('SELECT * FROM genres ORDER BY RANDOM() LIMIT 3');
        $genres = [];
        foreach ($result as $value) {
            $genres[] = new genres($value['id'], $value['nom']);
        }
        return $genres;
    }

    public function countGenres()
    {
        $stmt = $this->pdo->query('SELECT COUNT(*) FROM genres');
        return $stmt->fetchColumn();
    }

    public function create($nom)
    {
        $stmt = $this->pdo->prepare('INSERT INTO genres (nom) VALUES (:nom)');
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function update($id, $nom)
    {
        $stmt = $this->pdo->prepare('UPDATE genres SET nom = :nom WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM genres WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
    }

}