<?php
    // get .env variables
    $lines = file(__DIR__ . "/.env", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {

        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }

function search($searchTerm) {
    $username = $_ENV["DB_USERNAME"];
    $password = $_ENV["DB_PASSWORD"];
    $database = $_ENV["DB_DATABASE"];
    $cluster = $_ENV["DB_CLUSTER"];

    //checkboxes/filter tags
    // If cider exists/is-selected then set $cider to x so that item types of "x" are filtered out of the results instead of item types of "cider" - keeping cider items in the results
    // Yes it would make more sense to filter IN the types of drinks selected but MongoDb didn't want to work that way while also matching to tags & names off items
    $cider = (isset($_POST["cider"])) ? "x" : "cider";
    $lager = (isset($_POST["lager"])) ? "x" : "lager";
    $ale = (isset($_POST["ale"])) ? "x" : "ale";
    $wine = (isset($_POST["wine"])) ? "x" : "wine";
    $spirits = (isset($_POST["spirits"])) ? "x" : "spirits";
    $venues = (isset($_POST["venues"])) ? "x" : "venue";

    // if no tags are selected then enable all types
    if($cider === "cider" && $lager === "lager" && $ale === "ale" && $wine === "wine" && $spirits === "spirits" && $venues === "venue") {
        $cider = "x";
        $lager = "x";
        $ale = "x";
        $wine = "x";
        $spirits = "x";
        $venues = "x";
    }

    // exclude the venues filter if the search function is called from the drinks page
    if($_SERVER["REQUEST_URI"] === "/drinks") {
        $venues = "venue";
    }
    
    $client = new MongoDB\Driver\Manager("mongodb+srv://$username:$password@$cluster/$database?retryWrites=true&w=majority");
    $regex = new \MongoDB\BSON\Regex("^{$searchTerm}", 'i'); // fuzzy search
    $itemName = ucwords($searchTerm);
    $filter = [
        // this basically grabs all item types and filters out the values of the variable (x if selected or the drink type if not selected)
        '$nor' => [
            ["type" => $cider],
            ["type" => $lager],
            ["type" => $ale],
            ["type" => $wine],
            ["type" => $spirits],
            ["type" => $venues]
        ],
        '$or' => [
            ["tags" => $regex],
            ["name" => $itemName]
        ]
    ];

    $query = new MongoDB\Driver\Query($filter);
    $cursor = $client->executeQuery("DiscoverDrink.items", $query);
    $results = [];
    foreach($cursor as $doc) {
        array_push($results, $doc);
    }

    return $results;
}
?>