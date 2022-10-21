<?php
    $mysqli = new mysqli("db", "user", "password", "appDB");

    if (isset($_POST['edit_name'])){
        $name = $_POST['edit_name'];
    }
    if (isset($_POST['edit_phone'])){
        $phone = $_POST['edit_phone'];
    }
    if (isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if (isset($_POST['edit'])) {
        $sql = ("UPDATE users SET username = '$name', phone = '$phone' WHERE ID = $id");
        $query = $mysqli->prepare($sql);
        // if (!$mysqli->prepare($sql)) {
        //     printf("Сообщение ошибки: %s\n", $mysqli->error);
        // }
        $query->execute();
        header('Location: /admin/users.php');
    }

?>