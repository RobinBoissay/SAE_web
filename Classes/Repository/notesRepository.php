<?php

namespace Repository;

use Entity\notes;
use PDOFactory;

class notesRepository{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function findAll()
    {
        $result = $this->pdo->query('SELECT * FROM notes');
        $notes = [];
        foreach ($result as $value) {
            $notes[] = new notes($value['id'], $value['user_id'], $value['album_id'], $value['note']);
        }
        return $notes;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM notes WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new notes($value['id'], $value['user_id'], $value['album_id'], $value['note']);
    }

}