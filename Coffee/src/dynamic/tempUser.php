<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Данные пользователя</div>
    <?php
        $mysqli = new mysqli("db", "user", "password", "appDB");
        $query = sprintf("SELECT * FROM users WHERE ID='%s'",
            $mysqli->real_escape_string($_SESSION['user']));
        $result = $mysqli->query($query);
        
        if ($result){
            foreach ($result as $row){
                echo "<div class='card2'>
                                <div class='cost'>Телефон {$row['phone']}</div>
                                <div class='capacity'>Пароль {$row['pass']}</div>
                            </div>";
            }
        }
    ?>
    <button><a href="http://localhost:8081/redirect2.php">Выйти</a></button>
</body>
</html>