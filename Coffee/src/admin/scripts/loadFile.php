<?php

$uploaddir = '/var/www/html/admin/files/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    #echo "Файл корректен и был успешно загружен.\n";
    header('Location: /admin/users.php');
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
    echo 'Некоторая отладочная информация:';    
    print_r($_FILES);
}
