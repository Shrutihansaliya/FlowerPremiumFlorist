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
        
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dbphpprojechflower";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['remove'])) {
    $cart_id = $_POST['cart_id'];
    $conn->query("DELETE FROM tblcart_item WHERE P_ID = $cart_id");
    
    header("Location: cart.php");
    exit();
}
?>
    </body>
</html>


