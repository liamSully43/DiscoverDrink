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
<form method="POST" action="<?php echo $route ?>">
    <input type="text" name="search" placeholder="Search" />
    <button class="dark" type="submit">Search</button>
</form>
<?php
    
    if(!$_POST) {
        $results = "";
    }
    else {
        // search page stuff - not needed for home page or bars
        $results = $_POST["search"];
        include "./searchDB.php";
        $results = search($results);
    }
    return $results;
?>