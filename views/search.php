<!DOCTYPE html>
<html>
    <head>
        <link href='../styles.css' type='text/css' rel='stylesheet' />
        <link rel="stylesheet" type="text/css" href="./CSS/search.css" />
        <!-- Google Fonts -->
        <link defer rel='preconnect' href='https://fonts.gstatic.com'>
        <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
        <title>Discover Drink | Search</title>
    </head>
    <body>
<?php
    require "components/header.php"; 
?>
        <div class="search-container">
<?php
    require "components/searchbar.php";
?>
        </div>
        <section class="card-container">
            <div class="black"></div>
            <div class="orange"></div>
            <div class="white"></div>
        </section>
    </body>
</html>