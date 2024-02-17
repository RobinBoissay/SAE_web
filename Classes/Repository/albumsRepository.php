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
            $albums[] = new albums($value['id'], $value['nom'], $value['artiste'], $value['date'], $value['genre_id']);
        }
        return $albums;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new albums($value['id'], $value['nom'], $value['artiste'], $value['date'], $value['genre_id']);
    }

}