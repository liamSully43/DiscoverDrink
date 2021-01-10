<?php
    $drinksHostName = getenv("DB_HOSTNAME_DRINKS", false);
    $drinksDatabase = getenv("DB_DRINKS", false);
    $drinksUserName = getenv("USER_NAME_DRINKS", false);
    $drinksPassword = getenv("PASSWORD_DRINKS", false);

    $venuesHostName = getenv("DB_HOSTNAME_VENUES", false);
    $venuesDatabase = getenv("DB_VENUES", false);
    $venuesUserName = getenv("USER_NAME_VENUES", false);
    $venuesPassword = getenv("PASSWORD_VENUES", false);

    $mysqli = new mysqli($drinksHostName, $drinksUserName, $drinksPassword, $drinksDatabase);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    else {
        echo "<p>Connected</p>";
    }

    function searchDrinks($query) {
        return "default";
    }

    function searchVenues($query) {
        return "default";
    }

    function searchBoth($query) {
        return "default";
    }
?>