<?php

namespace models;

use PDOFactory;

class users{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function getUsers()
    {
        $stmt = $this->pdo->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }

    public function getUser($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function createUser($nom, $prenom, $email, $password)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)');
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->bindParam(':prenom', $prenom, SQLITE3_TEXT);
        $stmt->bindParam(':email', $email, SQLITE3_TEXT);
        $stmt->bindParam(':password', $password, SQLITE3_TEXT);
        $stmt->execute();
    }

    public function updateUser($id, $nom, $prenom, $email, $password)
    {
        $stmt = $this->pdo->prepare('UPDATE users SET nom = :nom, prenom = :prenom, email = :email, password = :password WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':nom', $nom, SQLITE3_TEXT);
        $stmt->bindParam(':prenom', $prenom, SQLITE3_TEXT);
        $stmt->bindParam(':email', $email, SQLITE3_TEXT);
        $stmt->bindParam(':password', $password, SQLITE3_TEXT);
        $stmt->execute();

    }
}