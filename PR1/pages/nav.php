<html lang="ru">
<head>
    <title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <h1>веб-сервис Navigation</h1>
    <?php

        //адрес проверки: http://localhost:8080/nav.php

        echo("Введите команду");
        echo("<form><input name='cmd'/></form>");
        $value = "";
        if (isset($_GET['cmd']))
            $value = $_GET['cmd'];
        
        $array = array(
            "ls", "ps", "whoami", "id"
        );

        if (in_array($value, $array))
            exec($value);
        else if ($value != "")
            echo("Запрещенная команда");
        
    ?>
</body>
</html>