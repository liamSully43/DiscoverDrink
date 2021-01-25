<head>
<link rel="stylesheet" type="text/css" href="./CSS/result.css" />
</head>
<div class="result">
    <img src="<?php echo $result->img; ?>" width="auto" height="auto" />
    <div class="text">
        <div class="header">
            <p><?php echo $result->name; ?><p>
            <?php $info = (isset($result->percentage)) ? $result->percentage : $result->price; ?>
            <p><?php echo $info; ?></p>
        </div>
        <p class="description"><?php echo $result->description; ?></p>
    </div>
</div>