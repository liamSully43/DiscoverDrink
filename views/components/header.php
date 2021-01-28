<head>
    <link href='../styles.css' type='text/css' rel='stylesheet' />
    <link href='../CSS/header.css' type='text/css' rel='stylesheet' />
    
    <!-- Google Fonts -->
    <link defer rel='preconnect' href='https://fonts.gstatic.com'>
    <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
</head>
<body>
    <header>
        <a class="header" href="/">Discover Drink</a>
        <nav>
            <?php $root = substr($_SERVER['REQUEST_URI'], 0, 7); // removed any queries from the URL ?>
            <a href='/search' class='<?php if($root === "/search") {echo "selected";} ?>'>Search</a>
            <a href='/drinks' class='<?php if($root === "/drinks") {echo "selected";} ?>'>Drinks</a>
            <a href='/venues' class='<?php if($root === "/venues") {echo "selected";} ?>'>Venues</a>
        </nav>
    </header>
</body>