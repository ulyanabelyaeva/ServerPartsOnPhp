<?php
session_start();
include __DIR__ . "/scripts/session_script.php";
include __DIR__ . "/scripts/delete_script.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Coffee</title>
</head>
<body>
    <div class="wrapper">
    <div>Данные сессии</div>
        <div>Текущий пользователь: </div>
        <div>Тема: <?php $theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'default'; echo $theme; ?></div>
        <div>Язык: <?php $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'default'; echo $lang; ?></div>
        <div>Изменение настроек сессии: </div>
        <form method='post'>
            <input type='text' name='theme'> white/black
            <input type='text' name='lang'> ru/en
            <button type='submit' name='change_session_data'>Сохранить</button>
        </form>
        <div class="title">Список пользователей</div>
        <ul>
        <?php
            $mysqli = new mysqli("db", "user", "password", "appDB");
            $result = $mysqli->query("SELECT * FROM users");
            foreach ($result as $row){
                echo "<li>{$row['username']} {$row['phone']} 
                <div class='btns'>
                <button><a href='user_put.php?edit={$row['ID']}'>Обновить</a></button>
                <form method='post' action='?id={$row['ID']}'><button type='submit' name='delete'>Удалить</button></form>
                <div></li>";
            }
        ?>
        </ul>
    </div>

    <form action="/logout" method="POST"><button type="submit">Выйти</button></form>
</body>
</html>