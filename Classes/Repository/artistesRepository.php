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

}