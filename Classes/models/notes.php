<?php

namespace models;

use PDOFactory;

class notes{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function getNotes()
    {
        $stmt = $this->pdo->query('SELECT * FROM notes');
        return $stmt->fetchAll();
    }

    public function getNote($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM notes WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createNote($titre, $contenu)
    {
        $stmt = $this->pdo->prepare('INSERT INTO notes (titre, contenu) VALUES (:titre, :contenu)');
        $stmt->bindParam(':titre', $titre, SQLITE3_TEXT);
        $stmt->bindParam(':contenu', $contenu, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function updateNote($id, $titre, $contenu)
    {
        $stmt = $this->pdo->prepare('UPDATE notes SET titre = :titre, contenu = :contenu WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':titre', $titre, SQLITE3_TEXT);
        $stmt->bindParam(':contenu', $contenu, SQLITE3_TEXT);
        $stmt->execute();

    }
}