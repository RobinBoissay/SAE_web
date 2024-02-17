<?php 

namespace Repository;

use Entity\albums_genres;
use PDOFactory;

class albums_genresRepository{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function findAll()
    {
        $result = $this->pdo->query('SELECT * FROM albums_genres');
        $albums_genres = [];
        foreach ($result as $value) {
            $albums_genres[] = new albums_genres($value['album_id'], $value['genre_id']);
        }
        return $albums_genres;
    }

    public function find($album_id, $genre_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums_genres WHERE album_id = :album_id AND genre_id = :genre_id');
        $stmt->bindParam(':album_id', $album_id, SQLITE3_INTEGER);
        $stmt->bindParam(':genre_id', $genre_id, SQLITE3_INTEGER);
        $stmt->execute();
        $value = $stmt->fetch();
        return new albums_genres($value['album_id'], $value['genre_id']);
    }

    public function find6RandomAlbumsByGenre($genre_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM albums_genres WHERE genre_id = :genre_id ORDER BY RANDOM() LIMIT 6');
        $stmt->bindParam(':genre_id', $genre_id, SQLITE3_INTEGER);
        $stmt->execute();
        $albums_genres = [];
        foreach ($stmt as $value) {
            $albums_genres[] = new albums_genres($value['album_id'], $value['genre_id']);
        }
        return $albums_genres;
    }

}