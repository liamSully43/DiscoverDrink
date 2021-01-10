<!DOCTYPE html>
<html>
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link href='../styles.css' type='text/css' rel='stylesheet' />
        <link href='../CSS/home.css' type='text/css' rel='stylesheet' />
        <link href='../CSS/home-tablet.css' type='text/css' rel='stylesheet' media="(max-width: 1200px)" />
        <link href='../CSS/home-mobile.css' type='text/css' rel='stylesheet' media="(max-width: 650px)" />
        <!-- Google Fonts -->
        <link defer rel='preconnect' href='https://fonts.gstatic.com'>
        <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
        <title>Discover Drink | Home</title>
    </head>
    <body>
<?php
    includeWithVariables('..\Discover Drink\components\header.php', array("class" => "home"), false); // set to name of page - only search, drinks & bars will highlight their respective links
    
    function includeWithVariables($filePath, $var = array(), $isSearch) {
        $output = null;
        if(file_exists($filePath)) {
            extract($var);
            
            ob_start();
            
            $results = include $filePath;
            if($isSearch) {
                echo $results;
            }
            
            $output = ob_get_clean();
        }
        print $output;
        return $output;
    }
    ?>
    <section class="text">
        <h1>Search for <i>alcohol, bars</i> & <i>venues</i> all in one place.</h1>
        <p>The all new Discover Drink website offers you the ability to search for your favourite alcohol or venues in one location</p>
    </section>
    <section class="search">
    <?php
        includeWithVariables('..\Discover Drink\components\searchbar.php', array("path" => "search", "class" => "dark"), true); // set to page directory - "search" for all pages except the drinks page where it is "drink"
    ?>
    </section>
    <section class="card-container">
        <div class="black"></div>
        <div class="orange"></div>
        <div class="white"></div>
    </section>
    </body>  
</html>