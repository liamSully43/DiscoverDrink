<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Search for different drinks, bars, pubs, clubs & venues all in one location." />
        <link href='../styles.css' type='text/css' rel='stylesheet' />
        <link href='../CSS/home.css' type='text/css' rel='stylesheet' />
        <link href='../CSS/home-tablet.css' type='text/css' rel='stylesheet' media="(max-width: 1200px)" />
        <link href='../CSS/home-mobile.css' type='text/css' rel='stylesheet' media="(max-width: 650px)" />
        <!-- Google Fonts -->
        <link defer rel='preconnect' href='https://fonts.gstatic.com'>
        <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
        <link rel="icon" type="image/png" href="../images/favicon.png" />
        <title>Discover Drink | Home</title>
    </head>
    <body>
<?php
    require "components/header.php"; 
?>
    <section class="text">
        <h1>Search for <i>alcohol, bars</i> & <i>venues</i> all in one place.</h1>
        <p>The all new Discover Drink website offers you the ability to search for your favourite alcohol or venues in one location</p>
    </section>
    <section class="search">
<?php
    require "components/searchbar.php";
?>
    </section>
    <section class="card-container">
        <div class="black"></div>
        <div class="orange"></div>
        <div class="white"></div>
    </section>
    </body>  
</html>