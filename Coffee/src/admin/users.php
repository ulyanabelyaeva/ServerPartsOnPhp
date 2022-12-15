<?php
include __DIR__ . "/scripts/delete_script.php";
session_start();
include __DIR__ . "/scripts/session_script.php";

$pageStyle = 'stylePinkDefault.css';
if (!empty($_SESSION['color'])){
    if ($_SESSION['color'] == 'blue')
        $pageStyle = 'styleBlue.css';
    if ($_SESSION['color'] == 'green')
        $pageStyle = 'styleGreen.css';
    if ($_SESSION['color'] == 'pink')
        $pageStyle = 'stylePinkDefault.css';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $pageStyle; ?>" type="text/css"/>
    <title>Coffee</title>
</head>
<body>
    <div class="wrapper">
    <div>Данные сессии</div>
        <?php echo $_SESSION['theme'] ?>
        <div>Тема: <?php $theme = isset($_SESSION['color']) ? $_SESSION['color'] : 'default pink'; echo $theme; ?></div>
        <div>Язык: <?php $lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'default ru'; echo $lang; ?></div>
        <div>Изменение настроек сессии: </div>
        <form method='post'>
            <label>Select a theme: </label>
            <select id="color" name="color">
                <option value="blue">blue</option>
                <option value="pink">pink</option>
                <option value="green">green</option>
            </select>
            <label>Select a lang: </label>
            <select id="lang" name="lang">
                <option value="ru">ru</option>
                <option value="en">en</option>
                <option value="fr">fr</option>
            </select>
            <button type='submit' name='change_session_data'>Сохранить</button>
        </form>
        <div class="title">Список пользователей</div>
        <ul>
        <?php
            $mysqli = new mysqli("db", "user", "password", "appDB");
            $result = $mysqli->query("SELECT * FROM users");
            foreach ($result as $row){
                echo "<li>{$row['username']} {$row['phone']} 
                <div class='btns'>
                <button><a href='user_put.php?edit={$row['ID']}'>Обновить</a></button>
                <form method='post' action='?id={$row['ID']}'><button type='submit' name='delete'>Удалить</button></form>
                <div></li>";
            }
        ?>
        </ul>
    </div>

    <div>Загрузка файлов</div>

    <!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
    <form enctype="multipart/form-data" action="scripts/loadFile.php" method="POST">
        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        Отправить этот файл: <input name="userfile" type="file" />
        <input type="submit" value="Отправить файл" />
    </form>

    <div>Получение файлов</div>
    <?php
        $files = scandir('/var/www/html/admin/files/');
        if (count($files) == 0) {
            echo "Нет загруженных файлов";
        } else {
            echo "Загруженные файлы";
            foreach ($files as $file) {
                echo "<div><a href='/admin/files/" . $file . "'>" . $file . "</a></div>";
            }
        }
    ?>

    <form action="/logout" method="POST"><button type="submit">Выйти</button></form>

    <?php
        phpinfo();
    ?>
</body>
</html>