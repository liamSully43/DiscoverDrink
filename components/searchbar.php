<head>
    <link href="../components/searchbar.css" rel="stylesheet" type="text/css" />
    <link href="../styles.css" rel="stylesheet" type="text/css" />
</head>
<form method="POST" action="/<?php echo $path ?>">
    <input type="text" name="search" placeholder="Search" />
    <button class="<?php echo $class ?>" type="submit">Search</button>
</form>
<?php
    
    if(!$_POST) {
        $result = "";
    }
    else {
        // search page stuff - not needed for home page or bars
        $result = $_POST["search"];
    }
    return $result;

?>