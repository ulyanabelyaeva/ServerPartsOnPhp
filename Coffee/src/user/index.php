<html lang="ru">
<head>
    <title>Coffee</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <a href="http://localhost:8081/admin/users.php">Посмотреть список всех пользователей</a>
    <div class="title">Кофейня</div>
    <div class="cards2">
        <?php
            $mysqli = new mysqli("db", "user", "password", "appDB");
            $result = $mysqli->query("SELECT * FROM types");
            if (!empty($result))
                foreach ($result as $row){
                    $image = $row['image'];
                    $cost = $row['cost'];
                    $capacity = $row['capacity'];
                    echo "<div class='card2'>
                                <img src='image/{$image}'>
                                <div class='cost'>{$cost} р</div>
                                <div class='capacity'>{$capacity} мл</div>
                            </div>";
                }
        ?>
    </div>

    <div class="title">Меню</div>

    <div class="cards">
    <ul>
    <?php
        $mysqli = new mysqli("db", "user", "password", "appDB");
        $result = $mysqli->query("SELECT * FROM products");
        if (!empty($result))
            foreach ($result as $row){
                $name = $row['name'];
                $type = $row['type'];
                echo "<li>
                        <div class='name'>{$name}</div>
                    </li>";
            }
    ?>
    </ul>
    </div>
    
</body>
</html>