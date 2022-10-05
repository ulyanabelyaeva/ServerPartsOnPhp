<?php
session_abort();

header('Location: http://localhost:8081/index.php', true, 301);
?>