<?php
    include 'include/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lonks</title>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="include/style.css">      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div id="main">
            <?php
            foreach(GetLinks() as $link){
                ?>
                    <a href="<?php echo $link["url"] ?>" target="_blank">
                        <div style="text-shadow: 0px 0px 5px <?php echo $link["color"] ?>">
                            <div class="item">
                                <div class="itempic">
                                    <img src="<?php echo $link["img"] ?>" alt="<?php echo $link["name"] ?>"/>
                                </div>
                                <div class="itemcontent">
                                    <div class="itemname"><h1><?php echo $link["name"] ?></h1></div>
                                    <div class="itemdesc"><p><?php echo $link["desc"] ?></p></div>
                                    <div class="itemurl"><?php echo $link["url"] ?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
            }
            ?>
        </div>
    </body>
</html>