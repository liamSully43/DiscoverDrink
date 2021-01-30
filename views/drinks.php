<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="description" content="Search for different types of drinks using the easy & simple to use search bar." />
        <link href='../styles.css' type='text/css' rel='stylesheet' />
        <link rel="stylesheet" type="text/css" href="./CSS/drinks.css" />
        <!-- Google Fonts -->
        <link defer rel='preconnect' href='https://fonts.gstatic.com'>
        <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
        <link rel="icon" type="image/png" href="../images/favicon.png" />
        <title>Discover Drink | Drinks</title>
    </head>
    <body>
        <main>
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
        </main>
    </body>
</html>