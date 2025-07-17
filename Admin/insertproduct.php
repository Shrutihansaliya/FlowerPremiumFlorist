<?php  
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
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
        <script src="
                https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>
        <style>
/*            table.insertflo{
                border: 1px solid black;
                margin-left: auto;
                margin-right: auto;
                padding: 5px 2.5px 5px 2.5px;
            }*/
            h2{
                text-align: center;
            }
            table.center {
                margin-left: auto;
                margin-right: auto;
            }
        </style>
        
        
        <style>
            form {
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
            }

            table{
                width: 100%;
                border-collapse: collapse;
            }

            .insertflo td, th {
                padding: 10px;
                text-align: left;
            }

            .insertflo input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="date"],
            input[type="number"],
            textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                background-color: #f4f4f9;

            }

            .insertflo input[type="submit"] {
                width: 100px;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                display: block;
                margin: 20px auto;
                background-color: black;
                color: #fff;
            }

            
            .insertflo label{
                font-weight: bold;
            }
            .insertflo input[type="submit"]:hover {
                background-color: #0056b3;
            }

            .insertflo h1 {
                text-align: center;
                margin-top: 20px;
            }
            
            
            .button{
                align-content: center;
                background-color: black;
                color: #fff;
                border: none;
                /*margin-left: 10px;*/
                margin-right: 10px;
                border-radius: 4px;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
                width: 230px;
            }

            .button:hover {
                background-color: #0056b3;
            }
            .button:focus{
                background-color: #0056b3;
            }
        </style>

        
        <style>
            .jeli table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px auto;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }

            .jeli th, td {
                padding: 10px;
                text-align: left;
            }

            .jeli th {
                background-color: black;
                color: white;
            }
        </style>
        
        
        
        
        <script>
                $(document).ready(function () {
                    $('#form1').hide();
                    $('#form2').hide();
                    $('#form3').hide();
                    $('#form4').hide();
                    $('#form5').hide();
                    $('#form6').hide();
                    $('#form7').hide();
                    $('#form8').hide();
                    $('#txtflower').click(function () {
                        $('#form1').toggle();
                        $('#form8').toggle();
                        $('#form2').hide();
                        $('#form3').hide();
                        $('#form4').hide();
                        $('#form5').hide();
                        $('#form6').hide();
                        $('#form7').hide();
                         
                    });
                    $('#txtbouquet').click(function () {
                        $('#form2').toggle();
                        $('#form3').toggle();
                        $('#form1').hide();
                        $('#form4').hide();
                        $('#form5').hide();
                        $('#form6').hide();
                        $('#form7').hide();
                         $('#form8').hide();
                    });
                    $('#txtcategory').click(function () {
                        $('#form4').toggle();
                        $('#form1').hide();
                        $('#form2').hide();
                        $('#form3').hide();
                        $('#form5').hide();
                        $('#form6').hide();
                        $('#form7').hide();
                         $('#form8').hide();
                    });
                    $('#btnseason').click(function () {
                        $('#form5').toggle();
                        $('#form1').hide();
                        $('#form2').hide();
                        $('#form3').hide();
                        $('#form4').hide();
                        $('#form6').hide();
                        $('#form7').hide();
                         $('#form8').hide();
                    });
                    $('#btncolor').click(function () {
                        $('#form6').toggle();
                        $('#form1').hide();
                        $('#form2').hide();
                        $('#form3').hide();
                        $('#form4').hide();
                        $('#form5').hide();
                        $('#form7').hide();
                        $('#form8').hide();
                    });
                    $('#btntype').click(function () {
                        $('#form7').toggle();
                        $('#form1').hide();
                        $('#form2').hide();
                        $('#form3').hide();
                        $('#form4').hide();
                        $('#form5').hide();
                        $('#form6').hide();
                        $('#form8').hide();
                    });                    
                });
            </script>
        <style>
            
            /* User links */
            .user-links {
                display: flex;
                float: right;
                padding: 0px 20px 0px 20px;
            }

            .user-links a {
                text-decoration: none;
                color: blue;
                font-size: 20px;
                margin-left: 20px;
                /*padding: 0px 20px 0px 20px;*/
            }

            /* Welcome section */
            .welcome-section {
                text-align: center;
                /*padding: 40px 10px;*/

                padding:20px 0px 40px 0px;

                background-color: #f7f7f7;
            }

            .welcome-section h1 {
                font-size: 36px;
                color: #333;
                margin-bottom: 10px;
                margin-right: 150px;
            }

            .welcome-section p {
                font-size: 18px;
                color: #666;
                margin-right: 150px;
            }
            
            
            .ilogo{
                float:left;
                width:250px;
                padding: 10px 20px 10px 20px;
            }
        </style>
        
         

    </head>

    <body id="account" class="template-customers-login" >
        
        
        <div class="ilogo">


            <a href="../index.php">
                <img src="../cdn/shop/files/0fc34013-64d2-4011-be96-996a701b5f5e.jpg" alt="Phuler - Flower Shop Shopify Theme">
            </a>

        </div>
        <section class="welcome-section">
            <h1>Add new product</h1>
            <p>view,edit and add the workers of the shop</p>

            <div class="user-links">
                 <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
        
        <?php
        // put your code here
        include 'header.php';
        ?>
        
        <br><br>
        
        <table class="center">
            <tr>
                <td>
                    <button name="btncategory" id="txtcategory" class="button" value="Add Category">Add Category</button>
                </td>
                <td>
                    <button name="btnseason" id="btnseason" class="button" value="Add Season">Add Season</button>
                </td>
                <td>
                    <button name="btncolor" id="btncolor" class="button" value="Add color">Add Color</button>
                </td>
                <td>
                    <button value="add flower detail" id="txtflower" class="button">Add flower detail</button>
                </td>
                <td>
                    <button value="add Bouquet/decore information" id="txtbouquet" class="button">Add bouquet/decore detail</button>
                </td>
                <td>
                    <button name="btntype" id="btntype" class="button" value="Add Occasion">Add Occasion</button>
                </td>
            </tr>
        </table>



           
        <br><br>
        <form method="post" enctype="multipart/form-data" id="form4">
            <h2>Enter Category</h2><br>
            <table class="insertflo">
                
                <tr>
                    <td><label>Category name : </label></td>
                    <td> <input type="text" name="txtcategoryname" placeholder="Enter category name" title="please enter only character" pattern="[A-Za-z\s]+" required=""></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtsubmit3" value="Submit" id="txtsub" class="button">
                    </td>
                </tr>
            </table>
       
        <?php
        
        if (isset($_POST['txtsubmit3'])) {
            $cname = $_POST['txtcategoryname'];

    // Query to check if the season already exists
    
    $dis="select * from tblcategory where NAME='$cname'";
            $dq= mysqli_query($conn, $dis);

    if (mysqli_num_rows($dq) > 0) {
        // If any rows are returned, the season already exists
        echo '<script>alert("Category already exists!")</script>';
    } else {
        // Insert query to save the new season
        $qi = "INSERT INTO tblcategory (NAME) VALUES ('$cname')";
       

        if (mysqli_query($conn, $qi)) {
            echo '<script>alert("category inserted successfully!")</script>';
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
        }
    }
}
        
        ?>   
            <?php
            $diss="select * from tblcategory";
        $dqc= mysqli_query($conn, $diss);
        echo '<table class="jeli" Border="all" style="border-collapse: collapse"><th>Category Name</th><th>Action</th>';
            
        while ($r = mysqli_fetch_assoc($dqc)) {
            $id=$r['ID'];
            $cname = $r['NAME'];
            
            
//            echo '<br>';
            echo '<tr><td>'.$cname.'
                </td><td><a href="edit.php?id='.$id.'">Edit</a>'." ".'<a href="delete.php?id='.$id.'">Delete</a></td>
                </tr>';
        }
        echo '</table>';
        
        
        ?>
        </form>
        
        
        
        
        
        

        <form method="post" enctype="multipart/form-data" id="form5">
            <h2>Enter Season</h2><br>
            <table class="insertflo">
                <tr>
                    <td><label>Season name : </label></td>
                    <td><input type="text" name="txtseasonname" placeholder="Enter season name" title="please enter only character" pattern="[A-Za-z\s]+" required=""></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtsubmit4" value="Submit" id="txtsub" class="button">
                    </td>
                </tr>
            </table>
         
        <?php
        
        
if (isset($_POST['txtsubmit4'])) {
    $sname = $_POST['txtseasonname'];

    // Query to check if the season already exists
    $dis = "SELECT * FROM tblseason WHERE SEASONNAME = '$sname'";
    $dq = mysqli_query($conn, $dis);

    if (mysqli_num_rows($dq) > 0) {
        // If any rows are returned, the season already exists
        echo '<script>alert("Season already exists!")</script>';
    } else {
        // Insert query to save the new season
        $qi = "INSERT INTO tblseason (SEASONNAME) VALUES ('$sname')";

        if (mysqli_query($conn, $qi)) {
            echo '<script>alert("Season inserted successfully!")</script>';
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
        }
    }
}
?>
            <?php
            $dis="select * from tblseason";
        $dq= mysqli_query($conn, $dis);
        echo '<table class="jeli" Border="all" style="border-collapse: collapse"><th>Season Name</th><th>Action</th>';
            
        while ($r = mysqli_fetch_assoc($dq)) {
            $sid=$r['SEASON_ID'];
            $sname = $r['SEASONNAME'];
            
            
//            echo '<br>';
            echo '<tr><td>'.$sname.'
                </td><td><a href="edits.php?id='.$sid.'">Edit</a>'." ".'<a href="deletes.php?id='.$sid.'">Delete</a></td>
                </tr>';
        }
        echo '</table>';
        
        
        ?>
        </form> 
        
        
        
        
        
        <form method="post" enctype="multipart/form-data" id="form6">
            <h2>Enter Color</h2><br>
            <table class="insertflo">
                <tr>
                    <td><label>Color name : </label></td>
                    <td><input type="text" name="txtcolorname" placeholder="Enter color name" title="please enter only character" pattern="[A-Za-z\s]+" required=""></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtsubmit5" value="Submit" id="txtsub" class="button">
                    </td>
                </tr>
            </table>
        
        <?php
      
        
        if (isset($_POST['txtsubmit5'])) {
    $colorname = $_POST['txtcolorname'];

    // Query to check if the season already exists
    $dis = "SELECT * FROM tblcolor where COLORNAME like '$colorname'";
    $dq = mysqli_query($conn, $dis);

    if (mysqli_num_rows($dq) > 0) {
        // If any rows are returned, the season already exists
        echo '<script>alert("color name already exists!")</script>';
    } else {
        // Insert query to save the new season
        $qi = "INSERT INTO tblcolor (COLORNAME) VALUES ('$colorname')";

        if (mysqli_query($conn, $qi)) {
            echo '<script>alert("color name inserted successfully!")</script>';
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
        }
    }
}
        
        ?>
            <?php
            $dis="select * from tblcolor";
        $dq= mysqli_query($conn, $dis);
        echo '<table class="jeli" Border="all" style="border-collapse: collapse"><th>Color Name</th><th>Action</th>';
            
        while ($r = mysqli_fetch_assoc($dq)) {
            $cid=$r['COLOR_ID'];
            $cname = $r['COLORNAME'];
            
            
//            echo '<br>';
            echo '<tr><td>'.$cname.'
                </td><td><a href="editc.php?id='.$cid.'">Edit</a>'." ".'<a href="deletec.php?id='.$cid.'">Delete</a></td>
                </tr>';
        }
        echo '</table>';
        
        
        ?>
         </form> 
        
        
        
        
        
        
        
        <form method="post" enctype="multipart/form-data" id="form7">
            <h2>Enter Occasion</h2><br>
            <table class="insertflo">
                <tr>
                    <td><label>Occasion name : </label></td>
                    <td><input type="text" name="txttypename" placeholder="Enter occasion name" title="please enter only character" pattern="[A-Za-z\s]+" required=""></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtsubmit6" value="Submit" id="txtsub" class="button">
                    </td>
                </tr>
            </table>
         
        <?php
        if (isset($_POST['txtsubmit6'])) {
            $tname = $_POST['txttypename'];
            
            
           $dis="select * from tbltype where TYPE_OCCASION_WISE like '$tname'";
            $dq= mysqli_query($conn, $dis);
            if (mysqli_num_rows($dq) > 0){
                echo '<script>alert("Occasion name already exists!!")</script>';
            } else {
                // Insert query to save the flower details into the database
            $qi = "INSERT INTO tbltype (TYPE_OCCASION_WISE)
                   VALUES ('$tname')";

            if (mysqli_query($conn, $qi)) {
                echo '<script>alert("Occasion inserted successfully!")</script>';
            } else {
                echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
            }
            }
        }
        ?>
            <?php
            $dis="select * from tbltype";
        $dq= mysqli_query($conn, $dis);
        echo '<table class="jeli" Border="all" style="border-collapse: collapse"><th>Occasion Name</th><th>Action</th>';
            
        while ($r = mysqli_fetch_assoc($dq)) {
            $tid=$r['TYPE_ID'];
            $tname = $r['TYPE_OCCASION_WISE'];
            
            
//            echo '<br>';
            echo '<tr><td>'.$tname.'
                </td><td><a href="editt.php?id='.$tid.'">Edit</a>'." ".'<a href="deletet.php?id='.$tid.'">Delete</a></td>
                </tr>';
        }
        echo '</table>';
        
        
        ?>
        </form> 
        
        
        
        
        <table>
            <tr><td>
        <table>
            <tr>
                <td>
                    
                        <form method="post" enctype="multipart/form-data" id="form1">
            <h2>Enter Flower detail</h2><br>
            <table class="insertflo">
                <tr>
                    <td><label>Category id : </label></td>
                    <td>1</td>
                </tr>
                 <tr>
                    <td><label>Provider name : </label></td>
                    <td>
                        <select name="txtprovider" required="" >
                            <option value="">Select one</option>
                            <?php
                            $qp = "select * from tblprovider";
                            $qpa = mysqli_query($conn, $qp);
                            while ($r = mysqli_fetch_assoc($qpa)) {
                                $id = $r['P_ID'];
                                $name = $r['NAME'];
                                echo '<option value="' . $id . '"> ' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Flower name : </label></td>
                    <td><input type="text" name="txtfname" placeholder="Enter flower name" title="please enter only character" pattern="[A-Za-z\s]+" required=""></td>
                </tr>
                <tr>
                    <td><label>Color name : </label></td>
                    <td>
                        <select name="txtcolorid"  required="">
                            <option value="">Select one</option>
                            <?php
                            $qc = "select * from tblcolor";
                            $qca = mysqli_query($conn, $qc);
                            while ($r = mysqli_fetch_assoc($qca)) {
                                $id = $r['COLOR_ID'];
                                $name = $r['COLORNAME'];
                                echo '<option value="' . $id . '"> ' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Flower description : </label></td>
                    <td><input type="text" name="txtfdescription" placeholder="Enter description" title="please enter only character" pattern="[A-Za-z\s]+" required=""></td>
                </tr>
                <tr>
                    <td><label>Flower price : </label></td>
                    <td><input type="text" name="txtfprice" placeholder="Enter price" title="please enter only number" pattern="^[0-9]*$" required=""></td>
                </tr>
                <tr>
                    <td><label>Flower photo : </label></td>
                    <td><input type="file" name="upload" required=""></td>
                </tr>
<!--                <tr>
                    <td><label>Flower quantity : </label></td>
                    <td><input type="text" name="txtfquantity" placeholder="Enter quantity of flower" title="please enter only number" pattern="^[0-9]*$" required=""></td>
                </tr>-->
                <tr>
                    <td><label>Flower season : </label></td>
                    <td>
                        <select name="txtseasonid" required="">
                            <option value="">Select one</option>
                            <?php
                            $qs = "select * from tblseason";
                            $qsa = mysqli_query($conn, $qs);
                            while ($r = mysqli_fetch_assoc($qsa)) {
                                $id = $r['SEASON_ID'];
                                $name = $r['SEASONNAME'];
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtsubmit" value="Submit" id="txtsub" class="button">
                    </td>
                </tr>
            </table>
        </form>   
        <?php
        if (isset($_POST['txtsubmit'])) {
            $pid = $_POST['txtprovider'];
            $fname = $_POST['txtfname'];
            $colorid = $_POST['txtcolorid'];
           // $vcolor= implode(" ", $colorid);
            $description = $_POST['txtfdescription'];
            $price = $_POST['txtfprice'];
            $name = $_FILES['upload']['name'];
            $tmp = $_FILES['upload']['tmp_name'];
//            $quantity = $_POST['txtfquantity'];
            $seasonid = $_POST['txtseasonid'];
            //$vseason= implode(",", $seasonid);
            //$dateadded = $_POST['txtfdate'];
            //$status = $_POST['txtstatus'];
            
         
            // Move uploaded file to the destination folder
            $destination = 'images/' . $name;
            move_uploaded_file($tmp, $destination);

            // Insert query to save the flower details into the database
            $qi = "INSERT INTO tblflower (CATEGORY_ID, P_ID, NAME, COLOR_ID, DESCRIPTION, PRICE,PHOTO, SEASON_ID)
                   VALUES (1, '$pid', '$fname', '$colorid', '$description', '$price','$destination', '$seasonid')";

            if (mysqli_query($conn, $qi)) {
                echo '<script>alert("Flower details inserted successfully!")</script>';
            } else {
                echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
            }
        }
        
        ?>
                </td><!-- comment -->
                <td>
        
                    <!<!-- flower stock management -->
<form method="post" enctype="multipart/form-data" id="form8">
            <h2>Enter Stock detail information for Flower</h2><br>
            <table class="insertflo">
               <tr>
                    <td><label>Flower name : </label></td>
                    <td>
                        <select name="txtiflowerid" required>
                            <option value="">Select one</option>
                            <?php
                            $qs = "select * from tblflower";
                            $qsa = mysqli_query($conn, $qs);
                            while ($r = mysqli_fetch_assoc($qsa)) {
                                $id = $r['F_ID'];
                                $name = $r['NAME'];
                                echo '<option value="' . $id . '">'.$id." : " . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Quantity : </label></td>
                    <td><input type="text" name="txtiquantity" placeholder="Enter quantity" title="please enter only number" pattern="^[0-9]*$" required=""></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtisubmit8" value="Submit" id="txtsub" class="button">
                    </td>
                </tr>
            </table>
        </form>  
        <?php
        if (isset($_POST['txtisubmit8'])) {
           
            $fid = $_POST['txtiflowerid'];
            $quantity = $_POST['txtiquantity'];

            // Insert query to save the flower details into the database
            $qi = "INSERT INTO tblstockmanagement  (F_ID, RemainingStock,totalstock)
                   VALUES ($fid,$quantity,$quantity)";

            if (mysqli_query($conn, $qi)) {
                echo '<script>alert("Flower stock inserted successfully!")</script>';
            } else {
                echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
            }
        }
        ?>
        </td>
            </tr>
        </table>        
                </td>
            </tr><!-- comment --></table>

        <table><tr><td>
        <form method="post" enctype="multipart/form-data" id="form2">
            <h2>Enter Item detail</h2><br>
            <table class="insertflo">
                <tr>
                    <td><label>Category name : </label></td>
                    <td>
                        <select name="txticategory" required="">
                            <option value="">Select one</option>
                            <?php
                            $qp = "select * from tblcategory";
                            $qpa = mysqli_query($conn, $qp);
                            while ($r = mysqli_fetch_assoc($qpa)) {
                                $id = $r['ID'];
                                $name = $r['NAME'];
                                echo '<option value="' . $id . '"> ' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Item name : </label></td>
                    <td><input type="text" name="txtiname" placeholder="Enter item name" title="please enter only character" pattern="[A-Za-z\s]+" required=""></td>
                </tr>
                <tr>
                    <td><label>Item description : </label></td>
                    <td><input type="text" name="txtidescription" placeholder="Enter description" title="please enter only character" pattern="[A-Za-z\s]+" required=""></td>
                </tr>
                <tr>
                    <td><label>Item price : </label></td>
                    <td><input type="text" name="txtiprice" placeholder="Enter price" title="please enter only number" pattern="^[0-9]*$" required=""></td>
                </tr>
                <tr>
                    <td><label>Item photo : </label></td>
                    <td><input type="file" name="uploadi" required=""></td>
                </tr>
<!--                <tr>
                    <td><label>Item quantity : </label></td>
                    <td><input type="text" name="txtiquantity" placeholder="Enter quantity" title="please enter only number" pattern="^[0-9]*$" required=""></td>
                </tr>-->
<!--                <tr>
                    <td><label>Item season : </label></td>
                    <td>
                        <select name="txtiseasonid" required="">
                            <option value="None">Select one</option>
                            <?php
//                            $qs = "select * from tblseason";
//                            $qsa = mysqli_query($conn, $qs);
//                            while ($r = mysqli_fetch_assoc($qsa)) {
//                                $id = $r['SEASON_ID'];
//                                $name = $r['SEASONNAME'];
//                                echo '<option value="' . $id . '">' . $name . '</option>';
//                            }
                            ?>
                        </select>
                    </td>
                </tr>-->
<!--                <tr>
                    <td><label>Item date of added : </label></td>
                    <td><input type="date" name="txtidate" required=""></td>
                </tr>-->
                <tr>
                    <td><label>Occasion name : </label></td>
                    <td>
                        <select name="txtitype" required>
                            <option value="">Select one</option>
                            <?php
                            $qp = "select * from tbltype";
                            $qpa = mysqli_query($conn, $qp);
                            while ($r = mysqli_fetch_assoc($qpa)) {
                                $id = $r['TYPE_ID'];
                                $name = $r['TYPE_OCCASION_WISE'];
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
<!--                <tr>
                    <td><label>Item status : </label></td>
                    <td><input type="radio" name="txtistatus" value="Available" required="">Available
                        <input type="radio" name="txtistatus" value="Not Available" required="">Not Available</td>
                </tr>-->
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtisubmit" value="Submit form" id="txtsub" class="button">
                    </td>
                </tr>
            </table>
        </form>   
        <?php
        if (isset($_POST['txtisubmit'])) {
            $cid = $_POST['txticategory'];
            $fname = $_POST['txtiname'];
            $description = $_POST['txtidescription'];
            $price = $_POST['txtiprice'];
            $name = $_FILES['uploadi']['name'];
            $tmp = $_FILES['uploadi']['tmp_name'];
//            $quantity = $_POST['txtiquantity'];
            //$seasonid = $_POST['txtiseasonid'];
            //$dateadded = $_POST['txtidate'];
            //$status = $_POST['txtistatus'];
            $typeid = $_POST['txtitype'];
            

            // Move uploaded file to the destination folder
            $destination = 'images/' . $name;
            move_uploaded_file($tmp, $destination);

            // Insert query to save the flower details into the database
            $qi = "INSERT INTO tblitem (CATEGORY_ID, NAME, DESCRIPTION, PRICE, PHOTO,TYPE_ID)
                   VALUES ($cid, '$fname', '$description', $price,'$destination', $typeid)";

            if (mysqli_query($conn, $qi)) {
                echo '<script>alert("Item details inserted successfully!")</script>';
            } else {
                echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
            }
        }
        ?>
        
                </td><td>
        
        
        
        
        <br><br>
        <form method="post" enctype="multipart/form-data" id="form3">
            <h2>Enter Item detail information</h2><br>
            <table class="insertflo">
                <tr>
                    <td><label>Item : </label></td>
                    <td>
                        <select name="txtiid" required>
                            <option value="">Select one</option>
                            <?php
                            $qp = "select * from tblitem";
                            $qpa = mysqli_query($conn, $qp);
                            while ($r = mysqli_fetch_assoc($qpa)) {
                                $id = $r['ITEM_ID'];
                                $name = $r['NAME'];
                                echo '<option value="' . $id . '">' . $id . ' : ' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr><tr>
                    <td><label>Flower name : </label></td>
                    <td>
                        <select name="txtiflowerid" required>
                            <option value="">Select one</option>
                            <?php
                            $qs = "select * from tblflower";
                            $qsa = mysqli_query($conn, $qs);
                            while ($r = mysqli_fetch_assoc($qsa)) {
                                $id = $r['F_ID'];
                                $name = $r['NAME'];
                                echo '<option value="' . $id . '">'.$id."-" . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>Quantity : </label></td>
                    <td><input type="text" name="txtiquantity" placeholder="Enter quantity" title="please enter only number" pattern="^[0-9]*$" required=""></td>
                </tr>
                <tr>
                    <td><label>Item Quantity : </label></td>
                    <td><input type="text" name="txtitemquantity" placeholder="Enter bouquet quantity" title="please enter only number" pattern="^[0-9]*$" required=""></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtisubmit2" value="Submit" id="txtsub" class="button">
                    </td>
                </tr>
            </table>
        </form>  
        <?php
        if (isset($_POST['txtisubmit2'])) {
            $itemid = $_POST['txtiid'];
            $fid = $_POST['txtiflowerid'];
            $quantity = $_POST['txtiquantity'];
            $bquantity=$_POST['txtitemquantity'];
            $ufquan=$quantity*$bquantity;

            // Insert query to save the flower details into the database
            $qi = "INSERT INTO tblitem_info (ITEM_ID, F_ID, QUANTITY)
                   VALUES ($itemid,$fid,$quantity)";
            
            $qbi="INSERT INTO tblstockmanagementofitem (ITEM_ID, RemainingStock,totalstock)
                   VALUES ($itemid,$bquantity,$bquantity)";
            
            $quf="update tblstockmanagement set totalstock=totalstock-$ufquan where F_ID=$fid";

            if (mysqli_query($conn, $qi)) {
                //echo '<script>alert("Item info details inserted successfully!")</script>';
            } else {
                //echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
            }
            
            if (mysqli_query($conn, $qbi)) {
                //echo '<script>alert("Item stock details inserted successfully!")</script>';
            } else {
                //echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
            }
            
            if (mysqli_query($conn, $quf)) {
                echo '<script>alert("flower stock details updated successfully!")</script>';
            } else {
                //echo '<script>alert("Error: ' . mysqli_error($conn) . '")</script>';
            }
        }
        ?>
        </td>
            </tr>
        </table>
    </body>
</html>