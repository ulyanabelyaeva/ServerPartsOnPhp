<?php
    
    if (isset($_POST['lang']) || isset($_POST['color'])){
        #echo "<script>console.log('Debug Objects: " . $_SESSION['color'] . " " . $_SESSION['lang'] . "' );</script>";
        if (isset($_POST['lang'])){
            $_SESSION['lang'] = $_POST['lang'];
        }
        if (isset($_POST['color'])){
            
            $_SESSION['color'] = $_POST['color'];
        }
        header('Location: /admin/users.php');
    }
