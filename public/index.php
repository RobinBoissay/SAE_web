<?php
// SPL autoloader

require __DIR__ .'/../Classes/autoloader.php';

Autoloader::register(); 

use Repository\albumsRepository;
use Repository\genresRepository;
use Repository\albums_genresRepository;
use Repository\artistesRepository;

session_start();

$request = $_SERVER['REQUEST_URI'];

$albumsRepository = new albumsRepository();
$genresRepository = new genresRepository();
$albums_genresRepository = new albums_genresRepository();
$artistesRepository = new artistesRepository();

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
        $artisteAleatoires = $artistesRepository->find3RandomArtistes();
        $artiste1 = $artisteAleatoires[0];
        $albumArtiste1 = $albumsRepository->findOneRandomAlbumByArtist($artiste1->getId());
        $artiste2 = $artisteAleatoires[1];
        $albumArtiste2 = $albumsRepository->findOneRandomAlbumByArtist($artiste2->getId());
        $artiste3 = $artisteAleatoires[2];
        $albumArtiste3 = $albumsRepository->findOneRandomAlbumByArtist($artiste3->getId());


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