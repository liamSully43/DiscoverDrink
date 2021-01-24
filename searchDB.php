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
    
    // whitelisted all IP addresses from MongoDBs side - added 6hr expiry

function search($searchTerm) {
    $username = $_ENV["DB_USERNAME"];
    $password = $_ENV["DB_PASSWORD"];
    $database = $_ENV["DB_DATABASE"];

    //checkboxes/filter tags
    // if the checkbox is checked set the variable to the type of drink for the filter
    $cider = (isset($_POST["cider"])) ? "cider" : "x";
    $lager = (isset($_POST["lager"])) ? "lager" : "x";
    $ale = (isset($_POST["ale"])) ? "ale" : "x";
    $wine = (isset($_POST["wine"])) ? "wine" : "x";
    $spirits = (isset($_POST["spirits"])) ? "spirits" : "x";
    $venues = (isset($_POST["venues"])) ? "venue" : "x";

    // if no tags are selected then enable all types
    if($cider === "x" && $lager === "x" && $ale === "x" && $wine === "x" && $spirits === "x" && $venues === "x") {
        $cider = "cider";
        $lager = "lager";
        $ale = "ale";
        $wine = "wine";
        $spirits = "spirits";
        $venues = "venue";
    }
    
    // exclude the venues filter if the search function is called from the drinks page
    if($_SERVER["REQUEST_URI"] === "/drinks") {
        $venues = "";
    }
    
    $client = new MongoDB\Driver\Manager("mongodb+srv://$username:$password@cluster0.4fyfr.mongodb.net/$database?retryWrites=true&w=majority");
    $filter = [
        '$or' => [
            ["type" => $cider],
            ["type" => $lager],
            ["type" => $ale],
            ["type" => $wine],
            ["type" => $spirits],
            ["type" => $venues],
        ],
        '$and' => [
            ["tags" => $searchTerm]
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