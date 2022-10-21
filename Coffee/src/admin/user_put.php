<?php
include __DIR__ . "/scripts/put_script.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/user/style.css" type="text/css"/>
    <title>Coffee</title>
</head>
<body>
    <div class="wrapper">
        <?php 
        if (isset($_GET['edit'])){
            $id = $_GET['edit'];
        }
        $mysqli = new mysqli("db", "user", "password", "appDB");
        $result = $mysqli->query("SELECT * FROM users WHERE ID = $id");
        ?>
        <?php foreach ($result as $row) { ?>
        <form method="post">
            <input type="hidden" name="id" value="<?=$row['ID']?>"/>
            <label>Name</label>
            <input type="text" name="edit_name" value="<?=$row['username']?>"/>
            <label>Phone</label>
            <input type="tel" name="edit_phone" value="<?=$row['phone']?>"/>
            <button name="edit" type="submit">Обновить</button>
          </form> 
        <?php } ?>
    </div>    
</body>
</html>