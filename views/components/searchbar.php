<?php
    if($_SERVER['REQUEST_URI'] === "/drinks") {
        $route = "/drinks";
    }
    else {
        $route = "/search";
    }
?>
<head>
    <link href="../styles.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/searchbar.css" rel="stylesheet" type="text/css" />
</head>
<?php
    if($_SERVER['REQUEST_URI'] === "/search" || $_SERVER['REQUEST_URI'] === "/drinks") {
        $background = "card";
    }
    else {
        $background = "";
    }
?>
<form method="POST" action="<?php echo $route ?>" class="<?php echo $background ?>">
    <input type="text" name="search" placeholder="Search" />
    <button class="dark" type="submit">Search</button>
</form>
<?php
    
    if(!$_POST) {
        $results = "";
    }
    else {
        // search page stuff - not needed for home page or venues
        $results = $_POST["search"];
        include "./searchDB.php";
        $results = search($results);
        for($i = 0; $i < count($results); $i++) {
            include "./views/components/result.php";
            // echo $results[$i]->name;
            // echo $results[$i]->percentage;
        }
    }
    return $results;
?>