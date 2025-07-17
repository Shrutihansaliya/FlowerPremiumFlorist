<?php
session_start();
?>
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
        if(isset($_SESSION['UNAME'])){
        $uname=$_SESSION['UNAME'];
//        $uname="jeli";
      
$host = "localhost";
$user = "root";
$password = "";
$dbname = "dbphpprojechflower";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

        // put your code here
        if (isset($_POST['addtocart'])) {
    $product_id = $_POST['ITEM_ID'];
    $quantity = $_POST['quantity'];

    // Check if product already in cart
    $checkCart = $conn->query("SELECT * FROM tblcart_item WHERE ITEM_ID = $product_id");
    if ($checkCart->num_rows > 0) {
        // Update quantity if product exists in cart
        $conn->query("UPDATE tblcart_item SET QUANTITY = quantity + $quantity WHERE ITEM_ID = $product_id");
    } else {
        // Add new product to cart
        $conn->query("INSERT INTO tblcart_item (ITEM_ID,UNAME, QUANTITY) VALUES ($product_id,'$uname', $quantity)");
    }

header("Location: index.php");
    exit();
}
        } else {
            header("Location: login.php");
}
        ?>
    </body>
</html>
