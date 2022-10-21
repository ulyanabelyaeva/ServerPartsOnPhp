<?php
include __DIR__ . "/scripts/create_script.php";
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
        <form method="post">
            <label>Name</label>
            <input type="text" name="name"/>
            <label>Phone</label>
            <input type="tel" name="phone"/>
            <label>Password</label>
            <input type="password" name="password"/>
            <button name="submit" type="submit">Зарегестрироваться</button>
          </form>
    </div>    
</body>
</html>