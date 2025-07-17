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
        
        $id = $_REQUEST['id'];
        // put your code here
        
        $conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
            if ($conn) {
                //echo "connection successfully";
            } else {
               // echo "error while connecting";
            }
            
            $qdc="delete from tblcolor where COLOR_ID=$id;";
        $qds= mysqli_query($conn, $qdc);
        if ($qds) {
                echo "<script>alert('successfully record delete');</script>";
           
                echo "<script>window.location.replace('insertproduct.php');</script>"; 
            }
        ?>
    </body>
</html>

