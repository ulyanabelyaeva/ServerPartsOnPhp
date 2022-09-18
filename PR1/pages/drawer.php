<html lang="ru">
<head>
    <title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <h1>веб-сервис Drawer</h1>
    <?php

        //адрес проверки: http://localhost:8080/drawer.php?num=2

        $num = 2;
        if(isset($_GET["num"])){
            $num = $_GET["num"];
        }

        /*header('Content-type: image/png');
        $image = imageCreateTrueColor(500, 400);
        $blue = imageColorAllocate($image, 0, 0, 250);
        $greyblue = imageColorAllocate($image, 0xDB, 0xE3, 0xEA);
        imageFilledRectangle($image, 0, 0, 499, 399, $greyblue);
        imageRectangle($image, 10, 10, 150, 90, $blue);
        imagepng($image);
        imageDestroy($image);*/
    ?>


        <div style="width: <?php echo $num*100%500+100?>; height: <?php echo $num*100%500+100?>; background-color: rgb(<?php echo $num*100%255?>, 100, <?php echo $num*100%255?>);">

        </div>
        
</body>
</html>