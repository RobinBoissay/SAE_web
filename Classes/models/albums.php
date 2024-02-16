<?php

namespace models;

use PDOFactory;

class albums{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function getAlbums()
    {
        $stmt = $this->pdo->query('SELECT * FROM albums');
        return $stmt->fetchAll();
    }

    public function getAlbum($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createAlbum($titre, $annee, $genre_id, $artiste_id, $image, $description)
    {
        $stmt = $this->pdo->prepare('INSERT INTO albums (titre, annee, genre_id, artiste_id, image, description) VALUES (:titre, :annee, :genre_id, :artiste_id, :image, :description)');
        $stmt->bindParam(':titre', $titre, SQLITE3_TEXT);
        $stmt->bindParam(':annee', $annee, SQLITE3_INTEGER);
        $stmt->bindParam(':genre_id', $genre_id, SQLITE3_INTEGER);
        $stmt->bindParam(':artiste_id', $artiste_id, SQLITE3_INTEGER);
        $stmt->bindParam(':image', $image, SQLITE3_TEXT);
        $stmt->bindParam(':description', $description, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function updateAlbum($id, $titre, $annee, $genre_id, $artiste_id, $image, $description)
    {
        $stmt = $this->pdo->prepare('UPDATE albums SET titre = :titre, annee = :annee, genre_id = :genre_id, artiste_id = :artiste_id, image = :image, description = :description WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':titre', $titre, SQLITE3_TEXT);
        $stmt->bindParam(':annee', $annee, SQLITE3_INTEGER);
        $stmt->bindParam(':genre_id', $genre_id, SQLITE3_INTEGER);
        $stmt->bindParam(':artiste_id', $artiste_id, SQLITE3_INTEGER);
        $stmt->bindParam(':image', $image, SQLITE3_TEXT);
        $stmt->bindParam(':description', $description, SQLITE3_TEXT);
        $stmt->execute();

    }
}