<?php
// SPL autoloader

require __DIR__ .'/../Classes/autoloader.php';
Autoloader::register(); 


session_start();

$request = $_SERVER['REQUEST_URI'];

ob_start();
switch ($request) {
    case '/' :
        require __DIR__ . '/../views/home.php';
        break;
    case '' :
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