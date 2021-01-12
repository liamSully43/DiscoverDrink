<?php
    $hostName = getenv("HOSTNAME", false);
    $database = getenv("DB", false);
    $userName = getenv("USER_NAME", false);
    $password = getenv("PASSWORD", false);

    $mysqli = new mysqli($hostName, $userName, $password, $database, 3306);
    
    if ($mysqli->connect_errno) {
        echo "yeet";
        echo $mysqli->connect_errno;
    }
    else {
        echo "<p>Connected</p>";
    }

    function search($query) {
        return "default";
    }
?>