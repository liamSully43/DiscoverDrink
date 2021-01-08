<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '':
        require __DIR__ . '/views/home.php';
        break;
    case '/search' :
        require __DIR__ . '/views/search.php';
        break;
    case '/drinks' :
        require __DIR__ . '/views/drinks.php';
        break;
    case '/bars' :
        require __DIR__ . '/views/bars.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
?>