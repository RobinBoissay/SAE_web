<?php
// SPL autoloader
require 'Classes/autoloader.php'; 
Autoloader::register(); 


session_start();

// Get the request
$request = $_SERVER['REQUEST_URI'];

// Route the request
switch ($request) {
    case '/' :
        require __DIR__ . '/views/home.php';
        break;
    case '' :
        require __DIR__ . '/views/home.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}