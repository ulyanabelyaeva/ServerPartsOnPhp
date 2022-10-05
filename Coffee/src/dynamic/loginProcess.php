<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

@session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 0;
}

$tel = ""; $password = "";
if(isset($_POST["tel"])){
    $tel = $_POST["tel"];
}
if(isset($_POST["password"])){
    $password = $_POST["password"];
}

$mysqli = new mysqli("db", "user", "password", "appDB");
$query = sprintf("SELECT * FROM users WHERE phone='%s' AND pass='%s'",
    $mysqli->real_escape_string($tel),
    $mysqli->real_escape_string($password));
$result = $mysqli->query($query);

if ($result){
    foreach ($result as $row){
        $_SESSION['user'] = $row['ID'];
    }
}
echo "Идентификатор текущего пользователя: ", $_SESSION['user'], "   ";

if ($_SESSION['user'] != 0){
    echo 'пользователь аутентивицирован';
    echo "<button><a href='http://localhost:8081/tempUser.php'>Перейти в личный кабинет</a></button>";
} else {
    echo 'неверные данные';
}

?>
</body>
</html>
