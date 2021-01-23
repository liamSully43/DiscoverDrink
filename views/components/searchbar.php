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
    <div class="tag-container">
        <label class="tags cider">
            Cider
            <input id="cider" type="checkbox" name="cider" value="checked" />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags lager">
            Lager
            <input id="lager" type="checkbox"name="lager" value="checked" />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags ale">
            Ale
            <input id="ale" type="checkbox"name="ale" value="checked" />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags wine">
            Wine
            <input id="wine" type="checkbox"name="wine" value="checked" />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags spirits">
            Spirits
            <input id="spirits" type="checkbox"name="spirits" value="checked" />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags venues <?php if($route === "/drinks") echo 'hide' ?>">
            Venues
            <input id="venues" type="checkbox"name="venues" value="checked" />
            <span class="custom-checkbox">&chi;</span>
        </label>
    </div>
</form>
<script type="text/JavaScript" src="../JS/searchbar.js"></script>
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