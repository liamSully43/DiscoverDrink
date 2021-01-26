<!DOCTYPE html>
<html>
    <head>
        <link href='../styles.css' type='text/css' rel='stylesheet' />
        <link href='./CSS/venues.css' type='text/css' rel='stylesheet' />
        <!-- Google Fonts -->
        <link defer rel='preconnect' href='https://fonts.gstatic.com'>
        <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
        <title>Discover Drink | Venues</title>
    </head>
    <body>
<?php
    require "components/header.php"; 
?>
<main>
    <aside>
    </aside>
    <div class="searchbar-container">
<?php
    require "components/searchbar.php";
    ?>
    </div>
    <div id="map"></div>
</main>
    </body>
    <script defer src="./JS/venues.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ0TaHfzRkeROEkV-GqIwNu_bLO8S_NCA&callback=initMap"></script>
</html>