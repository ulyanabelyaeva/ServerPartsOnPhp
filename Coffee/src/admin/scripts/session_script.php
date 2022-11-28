<?php
if (isset($_POST['change_session_data'])) {
       
    if (isset($_POST['theme'])){
        $_SESSION['theme'] = $_POST['theme'];
    }

    if (isset($_POST['lang'])){
        $_SESSION['lang'] = $_POST['lang'];
    }

    header('Location: /user/index.html');
}
?>