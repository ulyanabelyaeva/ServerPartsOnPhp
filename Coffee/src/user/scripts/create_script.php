<?php
    $mysqli = new mysqli("db", "user", "password", "appDB");

    if (isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if (isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }
    if (isset($_POST['password'])){
        $password = $_POST['password'];
    }
    if (isset($_POST['submit'])) {
        $sql = ("INSERT INTO users (username, phone, pass) VALUES( '$name', '$phone', '$password')");
        $query = $mysqli->prepare($sql);
        $query->execute();
        header('Location: /user/index.html');
    }

?>