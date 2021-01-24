<head>
<link rel="stylesheet" type="text/css" href="./CSS/result.css" />
</head>
<div class="result">
    <img src="<?php echo $result->img; ?>" width="120" height="auto" />
    <div class="text">
        <div class="header">
            <p><?php echo $result->name; ?><p>
            <p><?php echo $result->percentage; ?></p>
        </div>
        <p class="description"><?php echo $result->description; ?></p>
    </div>
</div>