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

}