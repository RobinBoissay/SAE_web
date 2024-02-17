<?php

require __DIR__ . '/Classes/autoloader.php';
Autoloader::register();

try {
$pdo = new PDO('sqlite:db.sqlite');
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

function createTable(){

    global $pdo;

    $pdo->exec('CREATE TABLE IF NOT EXISTS albums (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        titre TEXT,
        annee INTEGER,
        artiste_id INTEGER,
        image TEXT
    )');
    

    $pdo->exec('CREATE TABLE IF NOT EXISTS artistes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT
    )');

    $pdo->exec('CREATE TABLE IF NOT EXISTS genres (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT
    )');

    $pdo->exec('CREATE TABLE IF NOT EXISTS albums_genres (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        album_id INTEGER,
        genre_id INTEGER
    )');
    
    $pdo->exec('CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT,
        prenom TEXT,
        email TEXT,
        password TEXT,
        admin INTEGER
    )'); 

    $pdo->exec('CREATE TABLE IF NOT EXISTS playlists (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER,    
        nom TEXT
    )');

    $pdo->exec('CREATE TABLE IF NOT EXISTS playlist_albums (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        playlist_id INTEGER,
        album_id INTEGER
    )');

    $pdo->exec('CREATE TABLE IF NOT EXISTS notes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER,
        album_id INTEGER,
        note INTEGER
    )');

    

}

function dropTable(){

    global $pdo;

    $pdo->exec('DROP TABLE IF EXISTS albums');
    $pdo->exec('DROP TABLE IF EXISTS artistes');
    $pdo->exec('DROP TABLE IF EXISTS albums_genres');
    $pdo->exec('DROP TABLE IF EXISTS genres');
    $pdo->exec('DROP TABLE IF EXISTS users');
    $pdo->exec('DROP TABLE IF EXISTS playlists');
    $pdo->exec('DROP TABLE IF EXISTS playlist_albums');
    $pdo->exec('DROP TABLE IF EXISTS NOTES');
}

function loadDataYaml($filePath){
    $yamlProvider = new YamlProvider();
    $yamlProvider->importYaml($filePath);
}

dropTable();
createTable();
loadDataYaml('fixtures/extrait.yml');

