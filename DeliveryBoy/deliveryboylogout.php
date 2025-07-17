<?php
session_start();
session_unset();
session_destroy();

//echo '<script>window.location.replace("http://localhost/PhpProjectflower/account/login.php")</script>';
echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
?>

