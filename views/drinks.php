<!DOCTYPE html>
<html>
    <head>
        <link href='../styles.css' type='text/css' rel='stylesheet' />
        <!-- Google Fonts -->
        <link defer rel='preconnect' href='https://fonts.gstatic.com'>
        <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
        <title>Discover Drink | Drinks</title>
    </head>
    <body>
<?php
    includeWithVariables('..\DiscoverDrink\components\header.php', array("class" => "drinks")); // set to name of page - only search, drinks & bars will highlight their respective links

    function includeWithVariables($filePath, $var = array()) {
        $output = null;
        if(file_exists($filePath)) {
            extract($var);

            ob_start();

            include $filePath;

            $output = ob_get_clean();
        }
        print $output;
        return $output;
    }
?>
        <p>Drinks</p>
    </body>  
</html>