<?php


class PDOFactory
{
    public static function getPDO()
    {
        $pdo = new PDO('sqlite:db.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}