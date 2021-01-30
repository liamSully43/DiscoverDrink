<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Search for different bars, pubs, clubs & venues all in one location using the interactive map or search bar." />
        <link href='../styles.css' type='text/css' rel='stylesheet' />
        <link href='./CSS/venues.css' type='text/css' rel='stylesheet' />
        <!-- Google Fonts -->
        <link defer rel='preconnect' href='https://fonts.gstatic.com'>
        <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
        <link rel="icon" type="image/png" href="../images/favicon.png" />
        <title>Discover Drink | Venues</title>
    </head>
    <body>
<?php
    require "components/header.php"; 
?>
<main>
    <aside>
        <!-- Venue info/values are filled in when a venue is selected on the map -->
        <img class="venue-image" src="" width="1" height="1" alt="Venue" title="Venue" />
        <h1 class="venue-name"></h1>
        <p class="venue-cost"></p>
        <p class="venue-description"></p>
        <a class="venue-link" href="/venues" target="_blank" rel="noreferrer" title="venue">Visit their website &#8618;</a> <!-- /venues is used as a placeholder in case the menu expands without a venue's info -->
        <button class="minimise" onclick="hideMenu()" title="Close preview">&laquo;</button>
    </aside>
    <div class="searchbar-container">
<?php
    require "components/searchbar.php";
    ?>
    </div>
    <div id="map"></div>
</main>
    </body>
    <!--
        venues.js is loaded first to prepare the functions for the map & the markers
        Then the PHP search() function is called to fetch all venues saved on the DB
        This is then passed to JS using the saveMarkers() function
        Then the google maps API loads last, which calls initMap() to load the map
        initMap() then calls addMarkers() to add the markers to the map

        If the venues are unable to be fetched then at least the map will load with no errors
    -->
    <script src="./JS/venues.js"></script>
    <?php
        include "./searchDB.php";
        $results = search("venue");
        $venues = json_encode($results);
        // call the JS displayMarkers function to display the map markers
        echo "<script type='text/JavaScript'>saveMarkers($venues)</script>"; // venues.js
    ?>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ0TaHfzRkeROEkV-GqIwNu_bLO8S_NCA&callback=initMap"></script>
</html>