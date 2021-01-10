<head>
    <link href='../styles.css' type='text/css' rel='stylesheet' />
    <link href='./components/header.css' type='text/css' rel='stylesheet' />
    
    <!-- Google Fonts -->
    <link defer rel='preconnect' href='https://fonts.gstatic.com'>
    <link defer href='https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,400&display=swap' rel='stylesheet'>
</head>
<body>
    <header>
        <a class="header" href="/">Discover Drink</a>
        <nav>
            <a href='/search' class='<?php if($class === "search") {echo "selected";} ?>'>Search</a>
            <a href='/drinks' class='<?php if($class === "drinks") {echo "selected";} ?>'>Drinks</a>
            <a href='/bars' class='<?php if($class === "bars") {echo "selected";} ?>'>Bars</a>
        </nav>
    </header>
</body>