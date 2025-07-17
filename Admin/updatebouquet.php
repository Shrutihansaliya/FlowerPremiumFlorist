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
                margin-left: 10px;
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


    <body>
        <div class="ilogo">


            <a href="../index.php">
                <img src="../cdn/shop/files/0fc34013-64d2-4011-be96-996a701b5f5e.jpg" alt="Phuler - Flower Shop Shopify Theme">
            </a>

        </div>
        <section class="welcome-section">
            <h1>Manage the products </h1>
            <p>edit the product of your flower shop efficiently with our powerful admin tools.</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
        <?php
        include 'header.php';
        ?>

        <?php
        $con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
        if (!$con) {
            die("Connection unsuccessful: " . mysqli_connect_error());
        }


        $bouquet_id = $_REQUEST['ITEM_ID'];

        $query = "SELECT * FROM tblitem WHERE ITEM_ID = '$bouquet_id'";
        $result = mysqli_query($con, $query);

        if ($rb = mysqli_fetch_assoc($result)) {
          
            $bbcategoryid = $rb['CATEGORY_ID'];
            $bbname = $rb['NAME'];
            $bbdescription = $rb['DESCRIPTION'];
            $bbprice = $rb['PRICE'];
//            $bbphoto = $rb['PHOTO'];
//            $bbquantity = $rb['STOCKQUANTITY'];
//            $bbseason_id = $rb['SEASON_ID'];
//            $bbdate_added = $rb['DATEADDED'];
            $bbtypeid = $rb['TYPE_ID'];
//            $bbstatus = $rb['STATUS'];
        }


        if (isset($_POST['txtsubmit'])) {

//            $cid = $_POST['txticategory'];
            $fname = $_POST['txtiname']; 
            $description = $_POST['txtidescription'];
            $price = $_POST['txtiprice'];
//            $quantity = $_POST['txtiquantity'];
//            $seasonid = $_POST['txtiseasonid'];
//            $dateadded = $_POST['txtidate'];
//            $status = $_POST['txtistatus'];
            $typeid = $_POST['txtitype'];

//            if ($_FILES['upload']['name']) {
//                $name = $_FILES['upload']['name'];
//                $tmp = $_FILES['upload']['tmp_name'];
//                $destination = 'images/' . $name;
//                move_uploaded_file($tmp, $destination);
//            } else {
//                $name = $bbphoto;
//            }
//CATEGORY_ID = '$cid'
//             STOCKQUANTITY = '$quantity',

            $upqu = "UPDATE tblitem 
                 SET 
                     NAME = '$fname', 
                     DESCRIPTION = '$description', 
                     PRICE = '$price', 
                     
                     
                  
                     TYPE_ID = '$typeid' 
                 WHERE ITEM_ID = '$bouquet_id'";

            if (mysqli_query($con, $upqu)) {
                echo "<script>alert('Bouquet updated successfully');</script>";
                echo "<script>location.replace('product.php');</script>";
                exit();
            } else {
                echo "<script>alert('Not updated');</script>";
            }
        }
        ?>



        <form method="post" enctype="multipart/form-data">

            <table class="insertflo">
                <tr>
                    <td><b>Bouquet ID:</td>
                    <td><input type="text" name="txtid" value="<?php echo $bouquet_id; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label>Bouquet Name:</label></td>
                    <td><input type="text" name="txtiname" pattern="^[A-Za-z\s]*$" value="<?php echo $bbname; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Category ID:</label></td>
                    <td><input type="text" name="txticategory" value="<?php echo $bbcategoryid; ?>" readonly></td>
                </tr>
                <tr>
                    <td><label>Bouquet Description:</label></td>
                    <td><input type="text" name="txtidescription" pattern="^[A-Za-z\s]*$" value="<?php echo $bbdescription; ?>" required></td>
                </tr>
                <tr>
                    <td><label>Price:</label></td>
                    <td><input type="text" name="txtiprice" pattern="^[0-9]*$" value="<?php echo $bbprice; ?>" required></td>
                </tr>
<!--                <tr>
                    <td><label>Photo:</label></td>
                    <td><input type="file" name="upload"></td>
                </tr>-->
<!--                <tr>
                    <td><label>Quantity:</label></td>
                    <td><input type="text" name="txtiquantity" pattern="^[0-9]*$" value="<?php echo $bbquantity; ?>" required></td>
                </tr>-->
<!--                <tr>
                    <td><label>Season:</label></td>
                    <td>
                        <select name="txtiseasonid" required>
                            <?php
//                            $qs = "SELECT * FROM tblseason";
//                            $qsa = mysqli_query($con, $qs);
//                            while ($r = mysqli_fetch_assoc($qsa)) {
//                                $id = $r['SEASON_ID'];
//                                $name = $r['SEASONNAME'];
//                                echo '<option value="' . $id . '" ' . (($id == $bbseason_id) ? 'selected' : '') . '>' . $name . '</option>';
//                            }
                            ?>


                        </select>
                    </td>
                </tr>-->
                <tr>
                    <td><label>Type:</label></td>
                    <td>
                        <select name="txtitype" required>
                            <?php
                            $qt = "SELECT * FROM tbltype";
                            $qta = mysqli_query($con, $qt);
                            while ($r = mysqli_fetch_assoc($qta)) {
                                $id = $r['TYPE_ID'];
                                $name = $r['TYPE_OCCASION_WISE'];

                                $selected = ($id == $bbtypeid) ? 'selected="selected"' : '';
                                echo '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>

<!--                <tr>
                    <td><label>Date Added:</label></td>
                    <td><input type="date" name="txtidate" value="<?php // echo $bbdate_added; ?>" required></td>
                </tr>-->
<!--                <tr>
                    <td><label>Status:</label></td>
                    <td>
                        <input type="radio" name="txtistatus" value="Available" <?php // echo ($bbstatus == 'Available') ? 'checked' : ''; ?>>Available
                        <input type="radio" name="txtistatus" value="Not Available" <?php // echo ($bbstatus == 'Not Available') ? 'checked' : ''; ?>>Not Available
                    </td>
                </tr>-->
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" name="txtsubmit" value="Update" class="button">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
