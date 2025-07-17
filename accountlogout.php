
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <?php
        session_start();
        session_unset();
session_destroy();

//header("Location: login.php");
 echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
exit;
        ?>
    </body>
</html>
