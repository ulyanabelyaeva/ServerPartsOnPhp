<?php

function addSign($pass){
    header('content-type: image/png');
    $image = imagecreatefrompng($pass);
    $blue = imagecolorallocate($image, 0, 0, 255);
    $text = "Belyaeva Ulyana";
    imagestring($image, 5, 0, 0, $text, $black);
    imagepng($image, $pass);
    imagedestroy($image);
}
