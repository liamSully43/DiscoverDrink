<?php
    $url = $_SERVER['REQUEST_URI'];
    // get the directory the user is visiting to direct the user to the correct page when submitting the form
    if($url === "/drinks" || $url === "/drinks?") {
        $directory = "/drinks";
    }
    else {
        $directory = "/search";
    }
    
    // removes any queries from the URL to auto add the venues tag if the search is coming from the venues page
    $root = substr($url, 0, 7);

    // save/show the search query & tags of a previous search
    $searchTerm = (isset($_POST["search"])) ? $_POST["search"] : "";
    $cider = (isset($_POST["cider"])) ? true : false;
    $lager = (isset($_POST["lager"])) ? true : false;
    $ale = (isset($_POST["ale"])) ? true : false;
    $wine = (isset($_POST["wine"])) ? true : false;
    $spirits = (isset($_POST["spirits"])) ? true : false;
    $venues = (isset($_POST["venues"])) ? true : false;
?>
<head>
    <link href="../styles.css" rel="stylesheet" type="text/css" />
    <link href="../CSS/searchbar.css" rel="stylesheet" type="text/css" />
</head>
<?php
    // add the background & tags if the searchbar component is used on /search or /drinks
    if($root === "/search" || $root === "/drinks") {
        $background = "card";
    }
    else {
        $background = "";
    }
?>
<form method="POST" action="<?php echo $directory ?>" class="<?php echo $background ?>">
    <label class="search-label" for="searchbar">Search bar</label>
    <input type="text" name="search" id="searchbar" placeholder="Search" value="<?php echo $searchTerm ?>" />
    <button class="dark" type="submit">
        <p>Search</p>
        <span class="bg"></span>
    </button>
    <div class="tag-container">
        <label class="tags cider <?php if($cider) echo "active" ?>"> <!-- adds the active class if selected on the last search -->
            Cider
            <input id="cider" type="checkbox" name="cider" value="checked" <?php if($cider) echo "checked" ?> /> <!-- checks the checkbox of selected on the last search -->
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags lager <?php if($lager) echo "active" ?>">
            Lager
            <input id="lager" type="checkbox"name="lager" value="checked" <?php if($lager) echo "checked" ?> />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags ale <?php if($ale) echo "active" ?>">
            Ale
            <input id="ale" type="checkbox"name="ale" value="checked" <?php if($ale) echo "checked" ?> />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags wine <?php if($wine) echo "active" ?>">
            Wine
            <input id="wine" type="checkbox"name="wine" value="checked" <?php if($wine) echo "checked" ?> />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags spirits <?php if($spirits) echo "active" ?>">
            Spirits
            <input id="spirits" type="checkbox"name="spirits" value="checked" <?php if($spirits) echo "checked" ?> />
            <span class="custom-checkbox">&chi;</span>
        </label>
        <label class="tags venues <?php if($root === "/drinks") echo 'hide'; if($venues) echo "active" ?>"> <!-- hide the venues tag if the component is used on the drinks page -->
            Venues
            <input id="venues" type="checkbox"name="venues" value="checked" <?php if($venues || $root === "/venues") echo "checked" ?> />
            <span class="custom-checkbox">&chi;</span>
        </label>
    </div>
</form>
<script type="text/JavaScript" src="../JS/searchbar.js"></script>
<?php
    // hides any $_POST related errors when used on the root URL
    if(!$_POST) {
        $searchTerm = "";
    }
    else {
        // search page stuff - not needed for home page or venues
        $searchTerm = $_POST["search"];
        include "./searchDB.php";
        $results = search($searchTerm); // searches the database and returns the results to this variable
        if(count($results) <= 0) {
            echo "<p class='no-reults'>No results found. Try narrowing your search.</p>";
        }
        else {
            $searchQuery = strtolower($searchTerm);
            // loops through each result in the array of results and displays the result component
            for($i = 0; $i < count($results); $i++) {
                $result = $results[$i];
                $name = strtolower($result->name);
                if($result->type === "venue" &&  $name == $searchQuery) {
                    header("Location: /venues?id=$result->index");
                }
                include "./views/components/result.php";
            }
        }
    }
?>