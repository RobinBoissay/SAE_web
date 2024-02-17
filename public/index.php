<?php
// SPL autoloader

require __DIR__ .'/../Classes/autoloader.php';

Autoloader::register(); 

use Repository\albumsRepository;
use Repository\genresRepository;
use Repository\albums_genresRepository;

session_start();

$request = $_SERVER['REQUEST_URI'];

$albumsRepository = new albumsRepository();
$genresRepository = new genresRepository();
$albums_genresRepository = new albums_genresRepository();

ob_start();
switch ($request) {
    case '':
    case '/' :
        $albumsDerniereSorties = $albumsRepository->find8LastAlbums();
        $genreAleatoires = $genresRepository->find3randomGenres();
        $genreAleatoire1 = $genreAleatoires[0];
        $albumsIdGenre1 = $albums_genresRepository->find6RandomAlbumsByGenre($genreAleatoire1->getId());
        foreach ($albumsIdGenre1 as $albumIdGenre1) {
            $albumsGenre1[] = $albumsRepository->find($albumIdGenre1->getAlbum_id());
        }
        $genreAleatoire2 = $genreAleatoires[1];
        $albumsIdGenre2 = $albums_genresRepository->find6RandomAlbumsByGenre($genreAleatoire2->getId());
        foreach ($albumsIdGenre2 as $albumIdGenre2) {
            $albumsGenre2[] = $albumsRepository->find($albumIdGenre2->getAlbum_id());
        }
        $genreAleatoire3 = $genreAleatoires[2];
        $albumsIdGenre3 = $albums_genresRepository->find6RandomAlbumsByGenre($genreAleatoire3->getId());
        foreach ($albumsIdGenre3 as $albumIdGenre3) {
            $albumsGenre3[] = $albumsRepository->find($albumIdGenre3->getAlbum_id());
        }
        require __DIR__ . '/../views/home.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/../views/404.php';
        break;
}
$content=ob_get_clean();

require __DIR__ . '/../views/base.php';

?>