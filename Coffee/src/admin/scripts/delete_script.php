<?php
    $mysqli = new mysqli("db", "user", "password", "appDB");


    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    if (isset($_POST['delete'])) {
        settype($id, "integer");
        $sql = "DELETE FROM users WHERE ID = $id";
        $query = $mysqli->prepare($sql);
        $query->execute();
        header('Location: /admin/users.php');
    }

?>