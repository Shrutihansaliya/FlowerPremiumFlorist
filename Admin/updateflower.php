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


     <html>
        <head>
            <title>Update Flower</title>
        </head>
        <body>

            <div class="ilogo">


                <a href="../index.php">
                    <img src="../cdn/shop/files/0fc34013-64d2-4011-be96-996a701b5f5e.jpg" alt="Phuler - Flower Shop Shopify Theme">
                </a>

            </div>
            <section class="welcome-section">
                <h1>Manage the products </h1>
                <p>edit the flower of your flower shop efficiently with our powerful admin tools.</p>

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



    $flower_id = $_REQUEST['F_ID'];

    //echo "<script>alert(' $flower_id')</script>";

    $query = "SELECT * FROM tblflower WHERE F_ID = '$flower_id'";
    $result = mysqli_query($con, $query);

    if ($rf = mysqli_fetch_assoc($result)) {

        $flowerid = $rf['F_ID'];
        $flCATEGORY_ID = $rf['CATEGORY_ID'];
        $flprovider_id = $rf['P_ID'];
        $flflower_name = $rf['NAME'];
        $flcolor_id = $rf['COLOR_ID'];
        $fldescription = $rf['DESCRIPTION'];
        $flprice = $rf['PRICE'];
//        $flphoto = $rf['PHOTO'];
//        $flquantity = $rf['STOCKQUANTITY'];
        $flseason_id = $rf['SEASON_ID'];
//        $fldate_added = $rf['DATEADDED'];
//        $flstatus = $rf['STATUS'];
    }

    if (isset($_POST['txtsubmit'])) {

        $flower_id = $_POST['txtid'];
//        $categoryid = $_POST['txtcategoryid'];
        $provider_id = $_POST['txtprovider'];
        $flower_name = $_POST['txtfname'];
        $color_id = $_POST['txtcolorid'];
        $description = $_POST['txtfdescription'];
        $price = $_POST['txtfprice'];
       
       
       
       
//        $quantity = $_POST['txtfquantity'];
        $season_id = $_POST['txtseasonid'];
//        $date_added = $_POST['txtfdate'];
//        $status = $_POST['txtstatus'];

//        $upqu = "UPDATE tblflower SET P_ID = '$provider_id',NAME = '$flower_name',COLOR_ID = $color_id, DESCRIPTION = '$description',PRICE = $price,STOCKQUANTITY = $quantity,SEASON_ID = '$season_id',STATUS = '$status' WHERE F_ID = '$flower_id'";
 $upqu = "UPDATE tblflower SET P_ID = '$provider_id',NAME = '$flower_name',COLOR_ID = $color_id, DESCRIPTION = '$description',PRICE = $price,SEASON_ID = '$season_id' WHERE F_ID = '$flower_id'";
        if (mysqli_query($con, $upqu)) {
            echo "<script>alert('Updated successfully');</script>";
          echo "<script>location.replace('product.php');</script>";
            exit();
        } else {
            echo "<script>alert('Not updated');</script>";
        }
    }
    ?>

    <!DOCTYPE html>
   

            <form method="post" enctype="multipart/form-data" id="form1">

                <table class="insertflo">
                    <tr>
                        <td><b>Flower ID:</td>
                        <td><input type="text" name="txtid" value="<?php echo $flower_id; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td><label>Category Id :</label></td>
                        <td><input type="text" name="txtcategoryid" value="<?php echo $flCATEGORY_ID; ?>" readonly></td>
                    </tr>


                    <tr>
                        <td><label>Provider id:</label></td>
                        <td>
                            <select name="txtprovider" required>
                                <?php
                                $qp = "SELECT * FROM tblprovider";
                                $qpa = mysqli_query($con, $qp);
                                while ($r = mysqli_fetch_assoc($qpa)) {
                                    $id = $r['P_ID'];
                                    $name = $r['NAME'];
                                    $selected = ($id == $flprovider_id) ? 'selected' : '';
                                    echo '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    </tr>
                    <tr>
                        <td><label>Flower name:</label></td>
                        <td><input type="text" name="txtfname" pattern="^[A-Za-z\s]*$" value="<?php echo $flflower_name; ?>" placeholder="Enter flower name" required></td>
                    </tr>
                    <tr>
                        <td><label>Color id:</label></td>
                        <td>
                            <select name="txtcolorid" required>
                                <?php
                                $qc = "SELECT * FROM tblcolor";
                                $qca = mysqli_query($con, $qc);
                                while ($r = mysqli_fetch_assoc($qca)) {
                                    $id = $r['COLOR_ID'];
                                    $name = $r['COLORNAME'];
                                    $selected = ($id == $flcolor_id) ? 'selected' : '';
                                    echo '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Flower description:</label></td>
                        <td><input type="text" name="txtfdescription" pattern="^[A-Za-z\s]*$" value="<?php echo $fldescription; ?>" placeholder="Enter description" required></td>
                    </tr>
                    <tr>
                        <td><label>Flower price:</label></td>
                        <td><input type="text" name="txtfprice" pattern="^[0-9]*$" value="<?php echo $flprice; ?>" placeholder="Enter price" required></td>
                    </tr>
<!--                    <tr>
                        <td><label>Flower photo:</label></td>
                        <td><input type="file" name="upload" required></td>
                    </tr>-->
<!--                    <tr>
                        <td><label>Flower quantity:</label></td>
                        <td><input type="text" name="txtfquantity" pattern="^[0-9]*$" value="<?php // echo $flquantity; ?>" placeholder="Enter quantity of flower" required></td>
                    </tr>-->
                    <tr>
                        <td><label>Flower season:</label></td>
                        <td>
                            <select name="txtseasonid" required>
                                <?php
                                $qs = "SELECT * FROM tblseason";
                                $qsa = mysqli_query($con, $qs);
                                while ($r = mysqli_fetch_assoc($qsa)) {
                                    $id = $r['SEASON_ID'];
                                    $name = $r['SEASONNAME'];
                                    $selected = ($id == $flseason_id) ? 'selected' : '';
                                    echo '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
<!--                    <tr>
                        <td><label>Flower date added:</label></td>

                        <td><input type="date" name="txtfdate" value="<?php echo $fldate_added ?>" required></td>
                    </tr>-->
<!--                    <tr>
                        <td><label>Flower status:</label></td>
                        <td>
                            <input type="radio" name="txtstatus" value="Available" <?php // echo ($flstatus == 'Available') ? 'checked' : ''; ?>>Available
                            <input type="radio" name="txtstatus" value="Not Available" <?php // echo ($flstatus == 'Not Available') ? 'checked' : ''; ?>>Not Available
                        </td>
                    </tr>-->
                    <tr>
                        <td colspan="2" style="text-align:center;">
                            <input type="submit" name="txtsubmit" value="Submit" id="txtsub" class="button">
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </html>
