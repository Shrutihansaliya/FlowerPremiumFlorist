<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }

        th, td {
            padding: 12px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #009879;
            color: white;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Optional: Alternate row colors */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        input{
            width: 30%;
        }
    </style>
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
            
            $qv = "select * from tbltype where TYPE_ID=$id;";
            $qva = mysqli_query($conn, $qv);

            while ($r = mysqli_fetch_assoc($qva)) {
                $name = $r["TYPE_OCCASION_WISE"];
                
                //echo "success   ";
            }
           
        
        ?>
        
        
        <form method="post" >
            <h2 style="text-align:center; margin-top: 50px; color: blue;"">Update the record</h2>
            <table style="margin-top: 20px; border-collapse:collapse;" align="center">
                <tr>
                    <td>
                        <label>Type id : </label>
                    </td>
                    <td>
<!--                        <input type="text" name="txtid" pattern="^[0-9]*$" value="<?php echo "$id"; ?>">-->
                        <?php echo "$id"; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Type Name : </label>
                    </td>
                    <td>
                        <input type="text" name="txtname" pattern="[A-Za-z\s]+" title="please enter only character" value="<?php
//                        if (isset($_POST['txtview'])) {
                            echo "$name";
                      //  }
                        ?>">
                    </td>
                </tr>
                               
                  
                <tr>
                    <td colspan="2">
                        <input type="submit" name="txtupdate" style="color: blue; width: 150px; margin: auto; display: block;" value="update">
                    </td>

                </tr>
            </table>
        </form>
        
        
        <?php
        if (isset($_POST['txtupdate'])) {
            $ncname=$_POST['txtname'];
        $qdc="update tbltype set TYPE_OCCASION_WISE='$ncname' where TYPE_ID=$id;";
        $qds= mysqli_query($conn, $qdc);
        if ($qds) {
                echo "<script>alert('successfully record update');</script>";
              //header("location: insertproduct.php");
              echo "<script>window.location.replace('insertproduct.php');</script>"; 
            }
        }
        ?>
    </body>
</html>
