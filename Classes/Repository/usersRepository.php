<?php

namespace Repository;

use Entity\users;
use PDOFactory;

class usersRepository{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function findAll()
    {
        $result = $this->pdo->query('SELECT * FROM users');
        $users = [];
        foreach ($result as $value) {
            $users[] = new users($value['id'], $value['nom'], $value['prenom'], $value['email'], $value['password'], $value['admin']);
        }
        return $users;
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new users($value['id'], $value['nom'], $value['prenom'], $value['email'], $value['password'], $value['admin']);
    }

    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email, SQLITE3_TEXT);
        $stmt->execute();
        $value = $stmt->fetch();
        return new users($value['id'], $value['nom'], $value['prenom'], $value['email'], $value['password'], $value['admin']);
    }

}