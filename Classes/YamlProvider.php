<?php

class YamlProvider
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = PDOFactory::getPDO();
    }

    public function importYAML($filePath)
    {
        // Charger le fichier YAML
        $yamlContents = file_get_contents($filePath);
        $data = $this->parseYAML($yamlContents);

        // Insérer les données dans la base de données
        foreach ($data as $album) {
            // Insérer l'artiste
            $this->insertArtist($album['parent']);

            // Récupérer l'ID de l'artiste
            $artistId = $this->getArtistId($album['parent']);

            // Insérer le(s) genre(s) et récupérer les IDs
            $genreIds = $this->insertGenres($album['genre']);

            // Insérer l'album
            $this->insertAlbum($album, $artistId, $genreIds);
        }
    }

    private function parseYAML($yamlContents)
    {
        $lines = explode(PHP_EOL, $yamlContents);
        $result = [];
        $currentAlbum = null;

        foreach ($lines as $line) {
            if (strpos($line, '- by:') === 0) {
                if ($currentAlbum) {
                    $result[] = $currentAlbum;
                }
                $currentAlbum = ['by' => trim(substr($line, 6))];
            } elseif (strpos($line, '  genre:') === 0) {
                $genreLine = trim(substr($line, 9));
                $genreLine = str_replace("[", "", $genreLine);
                $genreLine = str_replace("]", "", $genreLine);
                $genreLine = explode(",", $genreLine);
                $currentAlbum['genre'] = array_map('trim', $genreLine);
            } elseif (strpos($line, '  ') === 0) {
                $parts = explode(':', trim($line));
                $key = trim($parts[0]);
                $value = trim($parts[1]);
                $currentAlbum[$key] = $value;
            }
        }

        if ($currentAlbum) {
            $result[] = $currentAlbum;
        }

        return $result;
    }

    private function insertArtist($artistName)
    {
        $stmt = $this->pdo->prepare('SELECT id FROM artistes WHERE nom = :nom');
        $stmt->execute([':nom' => $artistName]);
        $existingArtistId = $stmt->fetchColumn();

        if ($existingArtistId) {
            return;
        }
        $stmt = $this->pdo->prepare('INSERT OR IGNORE INTO artistes (nom) VALUES (:nom)');
        $stmt->execute([':nom' => $artistName]);
    }

    private function getArtistId($artistName)
    {
        $stmt = $this->pdo->prepare('SELECT id FROM artistes WHERE nom = :nom');
        $stmt->execute([':nom' => $artistName]);
        return $stmt->fetchColumn();
    }

    private function insertGenres($genres)
    {
        if (empty($genres)) {
            return [];
        }

        $genreIds = [];


        foreach ($genres as $genre) {
            if(empty($genre)){
                continue;
            }
            $stmt = $this->pdo->prepare('SELECT id FROM genres WHERE LOWER(nom) = LOWER(:nom)');
            $stmt->execute([':nom' => $genre]);
            $existingGenreId = $stmt->fetchColumn();

            if (!$existingGenreId) {
                $stmt = $this->pdo->prepare('INSERT INTO genres (nom) VALUES (:nom)');
                $stmt->execute([':nom' => $genre]);
                $genreIds[] = $this->pdo->lastInsertId();
            } else {
                $genreIds[] = $existingGenreId;
            }
        }

        return $genreIds;
    }

    private function insertAlbum($album, $artistId, $genreIds)
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO albums (titre, annee, artiste_id, image, date)
            VALUES (:titre, :annee, :artiste_id, :image, :date)
        ');

        $stmt->execute([
            ':titre' => $album['title'],
            ':annee' => $album['releaseYear'],
            ':artiste_id' => $artistId,
            ':image' => $album['img'],
            ':date' => date('Y-m-d H:i:s')
        ]);

        $albumId = $this->pdo->lastInsertId();

        // Insérer les relations albums-genres
        foreach ($genreIds as $genreId) {
            $stmt = $this->pdo->prepare('INSERT INTO albums_genres (album_id, genre_id) VALUES (?, ?)');
            $stmt->execute([$albumId, $genreId]);
        }
    }
}