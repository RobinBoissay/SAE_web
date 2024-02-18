<?php
// SPL autoloader

require __DIR__ .'/../Classes/autoloader.php';

Autoloader::register(); 

use Repository\albumsRepository;
use Repository\genresRepository;
use Repository\albums_genresRepository;
use Repository\artistesRepository;
# phpinfo();
session_start();

$request = $_SERVER['REQUEST_URI'];

$albumsRepository = new albumsRepository();
$genresRepository = new genresRepository();
$albums_genresRepository = new albums_genresRepository();
$artistesRepository = new artistesRepository();

$artist = isset($_GET['artist']) ? $_GET['artist'] : null;
$artist = $artist ? (int)$artist : null;
$genre = isset($_GET['genre']) ? $_GET['genre'] : null;
$genre = $genre ? (int)$genre : null;
$year = isset($_GET['year']) ? $_GET['year'] : null;
$year = $year ? (int)$year : null;
$search = isset($_GET['search']) ? $_GET['search'] : null;
$search = $search ? (string)$search : null;


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
    case '/artistes':
        // Affichage de la page artistes avec leurs albums
        $artistes = $artistesRepository->findAll();
        foreach ($artistes as $artiste) {
            $albumsArtiste[$artiste->getId()] = $albumsRepository->findAllAlbumsByArtist($artiste->getId());
        }
        require __DIR__ . '/../views/artistes.php';
        break;
    case str_starts_with($request, '/albums'):
        $genres = $genresRepository->findAll();
        $artistes = $artistesRepository->findAll();
        $annees = $albumsRepository->findAllYears();
        if($search !== null){
            $albums = $albumsRepository->findAllAlbumsByString($search);
        }elseif ($artist !== null) {
            $albums = $albumsRepository->findAllAlbumsByArtist($artist);
        } elseif ($genre !== null) {
            $albums = $albumsRepository->findAllAlbumsByGenre($genre);
        } elseif ($year !== null) {
            $albums = $albumsRepository->findAllAlbumsByYear($year);
        } else {
            $albums = $albumsRepository->findAll();
        }
        require __DIR__ . '/../views/albums.php';
        break;
    case '/admin':
        $nbAlbums = $albumsRepository->countAlbums();
        $nbGenres = $genresRepository->countGenres();
        $nbArtistes = $artistesRepository->countArtistes();
        $nbUsers = 0;
        $albumsRecents = $albumsRepository->find8LastAlbums();
        require __DIR__ . '/../views/admin/admin.php';
        break;
    case str_starts_with($request, '/admin/artists'):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST['_method']) {
                case 'POST':
                    $artistesRepository->create($_POST['nom']);
                    break;
                case 'PUT':
                    $artistesRepository->update($_POST['id'], $_POST['nom']);
                    break;
                case 'DELETE':
                    $artistesRepository->delete($_POST['id']);
                    break;
            }    
        }
        $artistes = $artistesRepository->findAll();
        require __DIR__ . '/../views/admin/artistCRUD.php';
        break;
    case str_starts_with($request, '/admin/genres'):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST['_method']) {
                case 'POST':
                    $genresRepository->create($_POST['nom']);
                    break;
                case 'PUT':
                    $genresRepository->update($_POST['id'], $_POST['nom']);
                    break;
                case 'DELETE':
                    $genresRepository->delete($_POST['id']);
                    break;
            }    
        }
        $genres = $genresRepository->findAll();
        require __DIR__ . '/../views/admin/genreCRUD.php';
        break;
    case str_starts_with($request, '/admin/albums'):
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST['_method']) {
                case 'POST':
                    $albumsRepository->create($_POST['titre'], $_POST['artiste_id'], $_POST['annee'], $_POST['image'], $_POST['genres']);
                    break;
                case 'PUT':
                    $albumsRepository->update($_POST['id'], $_POST['titre'], $_POST['artiste_id'], $_POST['annee'], $_POST['image'], $_POST['genres']);
                    break;
                case 'DELETE':
                    $albumsRepository->delete($_POST['id']);
                    break;
            }    
        }
        $albums = $albumsRepository->findAll();
        $albumsGenres = [];

        foreach ($albums as $album) {
            $albumsGenres[$album->getId()] = $albums_genresRepository->findAllGenresByAlbum($album->getId());
        }
        $artistes = $artistesRepository->findAll();
        $genres = $genresRepository->findAll();
        require __DIR__ . '/../views/admin/albumCRUD.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/../views/404.php';
        break;
}
$content=ob_get_clean();

ob_start();
if (str_starts_with($request, '/admin')) {
    require __DIR__ . '/../views/admin/adminBase.php';
}
$adminNav = ob_get_clean();

require __DIR__ . '/../views/base.php';


?>