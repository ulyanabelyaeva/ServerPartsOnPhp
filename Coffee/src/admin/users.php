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
        <div class="title">Список пользователей</div>
        <ul>
        <?php
            $mysqli = new mysqli("db", "user", "password", "appDB");
            $result = $mysqli->query("SELECT * FROM users");
            foreach ($result as $row){
                echo "<li>{$row['username']} {$row['phone']}</li>";
            }
        ?>
        </ul>
    </div>

    <a href="http://localhost:8081/user/logout"><button>Выйти</button></a>
</body>
</html>