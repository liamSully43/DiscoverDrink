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
        <a href="<?php echo $result->link ?>" target="_blank" rel="nofollow">More information &#8618;</a>
        <?php if(isset($result->index)){ echo "<a href='/venues?id=$result->index'>Visit</a>"; } ?>
    </div>
</div>