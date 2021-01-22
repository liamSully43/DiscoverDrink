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
    
    $client = new MongoDB\Driver\Manager("mongodb+srv://$username:$password@cluster0.4fyfr.mongodb.net/$database?retryWrites=true&w=majority");
    $filter = ["type" => "cider", "name" => $searchTerm];
    $query = new MongoDB\Driver\Query($filter);
    $cursor = $client->executeQuery("DiscoverDrink.items", $query);
    // echo results
    foreach($cursor as $doc) {
        echo $doc->type;
        echo $doc->name;
        echo $doc->percentage;
        echo $doc->description;
        $img = $doc->img;
        echo "<img width='60' height='auto' src='$img' />";
    }


    // default/placeholder code for returning results
    class Drinks {
        public $name;
        public $percentage;

        function setName($name) {
            $this->name = $name;
        }

        function setPercentage($per) {
            $this->percentage = $per;
        }
    }

    $one = new Drinks();
    $two = new Drinks();
    $one->setName("water");
    $one->setPercentage("0%");
    $two->setName("beer");
    $two->setPercentage("4%");

    return array($one, $two);
}   
?>