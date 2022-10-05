<?php
    $name = ""; $tel = ""; $password = ""; $confirmPassword = "";
    if(isset($_POST["name"])){
        $name = $_POST["name"];
    }
    if(isset($_POST["tel"])){
        $tel = $_POST["tel"];
    }
    if(isset($_POST["password"])){
        $password = $_POST["password"];
    }
    if(isset($_POST["confirmPassword"])){
        $confirmPassword = $_POST["confirmPassword"];
    }

    $mysqli = new mysqli("db", "user", "password", "appDB");
    $query = sprintf("INSERT INTO users (name, phone, pass) VALUES ('%s', '%s','%s')",
        $mysqli->real_escape_string($name),
        $mysqli->real_escape_string($tel),
        $mysqli->real_escape_string($password));
    $result = $mysqli->query($query);

    if ($result){
        echo 'пользователь зарегестрирован';
    } else {
        echo 'неверные данные';
    }
?>