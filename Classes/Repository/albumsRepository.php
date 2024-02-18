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

    public function findAllYears()
    {
        $result = $this->pdo->query('SELECT DISTINCT annee FROM albums ORDER BY annee DESC');
        $years = [];
        foreach ($result as $value) {
            $years[] = $value['annee'];
        }
        return $years;
    }

    public function findAllAlbumsByYear($year)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums WHERE annee = :year');
        $stmt->bindParam(':year', $year, SQLITE3_INTEGER);
        $stmt->execute();
        $albums = [];
        foreach ($stmt as $value) {
            $albums[] = new albums($value['id'], $value['titre'], $value['annee'], $value['artiste_id'], $value['image'], $value['date']);
        }
        return $albums;
    }

    public function findAllAlbumsByGenre($genre_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums NATURAL JOIN albums_genres WHERE genre_id = :genre_id');
        $stmt->bindParam(':genre_id', $genre_id, SQLITE3_INTEGER);
        $stmt->execute();
        $albums = [];
        foreach ($stmt as $value) {
            $albums[] = new albums($value['id'], $value['titre'], $value['annee'], $value['artiste_id'], $value['image'], $value['date']);
        }
        return $albums;
    }

    public function findAllAlbumsByString($string)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums WHERE titre LIKE :titre');
        $stmt->execute([':titre' => '%'.$string.'%']);
        $albums = [];
        foreach ($stmt as $value) {
            $albums[] = new albums($value['id'], $value['titre'], $value['annee'], $value['artiste_id'], $value['image'], $value['date']);
        }
        return $albums;
    }

    public function countAlbums()
    {
        $result = $this->pdo->query('SELECT COUNT(*) FROM albums');
        return $result->fetchColumn();
    }

    public function create($titre, $artiste_id, $annee, $image, $genre_id)
    {

        $stmt = $this->pdo->prepare('INSERT INTO albums (titre, artiste_id, annee, image, date) VALUES (:titre, :artiste_id, :annee, :image, :date)');
        $stmt->bindParam(':titre', $titre, SQLITE3_TEXT);
        $stmt->bindParam(':artiste_id', $artiste_id, SQLITE3_INTEGER);
        $stmt->bindParam(':annee', $annee, SQLITE3_INTEGER);
        $stmt->bindParam(':image', $image, SQLITE3_TEXT);
        $stmt->bindParam(':date', date('Y-m-d H:i:s'), SQLITE3_TEXT);
        $stmt->execute();

        $albumId = $this->pdo->lastInsertId();
        foreach ($genre_id as $genreId) {
            $stmt = $this->pdo->prepare('INSERT INTO albums_genres (album_id, genre_id) VALUES (:album_id, :genre_id)');
            $stmt->bindParam(':album_id', $albumId, SQLITE3_INTEGER);
            $stmt->bindParam(':genre_id', $genreId, SQLITE3_INTEGER);
            $stmt->execute();
        }
    }

    public function update($id, $titre, $artiste_id, $annee, $image, $genre_id)
    {
        $stmt = $this->pdo->prepare('UPDATE albums SET titre = :titre, artiste_id = :artiste_id, annee = :annee, image = :image WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->bindParam(':titre', $titre, SQLITE3_TEXT);
        $stmt->bindParam(':artiste_id', $artiste_id, SQLITE3_INTEGER);
        $stmt->bindParam(':annee', $annee, SQLITE3_INTEGER);
        $stmt->bindParam(':image', $image, SQLITE3_TEXT);
        $stmt->execute();

        $stmt = $this->pdo->prepare('DELETE FROM albums_genres WHERE album_id = :album_id');
        $stmt->bindParam(':album_id', $id, SQLITE3_INTEGER);
        $stmt->execute();

        foreach ($genre_id as $genreId) {
            $stmt = $this->pdo->prepare('INSERT INTO albums_genres (album_id, genre_id) VALUES (:album_id, :genre_id)');
            $stmt->bindParam(':album_id', $id, SQLITE3_INTEGER);
            $stmt->bindParam(':genre_id', $genreId, SQLITE3_INTEGER);
            $stmt->execute();
        }
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM albums WHERE id = :id');
        $stmt->bindParam(':id', $id, SQLITE3_INTEGER);
        $stmt->execute();
    }

}