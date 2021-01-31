<?php
$index = substr($_SERVER['REQUEST_URI'], 11); // the index of a venue in a /venues request query - without this any /venue request with a query would be directed to the the 404 page
switch ($_SERVER['REQUEST_URI']) {
    case '/':
    case '':
        require __DIR__ . '/views/home.php';
        break;
    case '/search' :
    case '/search?' :
        require __DIR__ . '/views/search.php';
        break;
    case '/drinks' :
    case '/drinks?' :
        require __DIR__ . '/views/drinks.php';
        break;
    case '/venues':
    case "/venues?id=$index":
        require __DIR__ . '/views/venues.php';
        break;
    default:
        // 404
        require __DIR__ . '/views/404.php';
        break;
}
?>