<?php

namespace Repository;

use Entity\albums;
use PDOFactory;

class albumsRepository{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function findAll()
    {
        $result = $this->pdo->query('SELECT * FROM albums');
        $albums = [];
        foreach ($result as $value) {
            $albums[] = new albums($value['id'], $value['titre'], $value['annee'], $value['artiste_id'], $value['image'], $value['date']);
        }
        return $albums;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new albums($value['id'], $value['titre'], $value['annee'], $value['artiste_id'], $value['image'], $value['date']);
    }

    public function find8LastAlbums()
    {
        $result = $this->pdo->query('SELECT * FROM albums ORDER BY date DESC LIMIT 8');
        $albums = [];
        foreach ($result as $value) {
            $albums[] = new albums($value['id'], $value['titre'], $value['annee'], $value['artiste_id'], $value['image'], $value['date']);
        }
        return $albums;
    }

    public function findOneRandomAlbumByArtist($artiste_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums WHERE artiste_id = :artiste_id ORDER BY RANDOM() LIMIT 1');
        $stmt->bindParam(':artiste_id', $artiste_id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new albums($value['id'], $value['titre'], $value['annee'], $value['artiste_id'], $value['image'], $value['date']);
    }

    public function findAllAlbumsByArtist($artiste_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums WHERE artiste_id = :artiste_id');
        $stmt->bindParam(':artiste_id', $artiste_id, SQLITE3_INTEGER);
        $stmt->execute();
        $albums = [];
        foreach ($stmt as $value) {
            $albums[] = new albums($value['id'], $value['titre'], $value['annee'], $value['artiste_id'], $value['image'], $value['date']);
        }
        return $albums;
    }

}