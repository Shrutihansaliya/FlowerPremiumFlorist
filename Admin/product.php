<?php
$con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
if (!$con) {
    die("Connection unsuccessful: " . mysqli_connect_error());
}
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

            }

            /* Welcome section */
            .welcome-section {
                text-align: center;


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
        <style>

            .container {
                width: 90%;
                /*                width: 80%;*/
                margin: 0 auto;
            }

            .filter {
                /*            margin: 20px 0;*/
                flex: 1;
                margin-right: 20px;
                margin-top: 20px;
                padding: 20px;
            }
            .filter form {
                display: flex;
                justify-content: space-between;
                max-width: 800px;
                margin: 0 auto;
            }
            .filter select, .filter button {

                font-size: 16px;
                width: 220px;
                /*                width: 100%;*/
                padding: 10px;
                /*                margin-left: 20px;
                                margin-right: 20px;*/
                margin: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;


            }
            .flower-list {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
            }
            .flower-item {
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                width: 22%;
                /*                 width: 30%;*/
                /*                margin: 15px 0;*/

                margin-top: 15px;
                padding: 20px;
                text-align: center;
            }
            .flower-item img {
                max-width: 100%;
                height:300px;
                /*                height: auto;*/
                border-radius: 8px;
            }
            .flower-item h3 {
                color: #333;
                margin: 10px 0;
            }
            .flower-item p {
                color: #777;
            }
            .flower-item .price {
                color: #e74c3c;
                font-size: 18px;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('#color').hide();
                $('#flower').hide();
//                $('#season').hide();
                $('#type').hide();
//                        $('#colorflower').hide();
                $("#category").change(function () {
                    var category_id = $(this).val();

                    if (category_id == 1)
                    {
                        $("#data").html("");
                        $('#color').show();
                        $('#flower').show();
//                        $('#season').show();
                         $('#type').hide();
                        $.ajax({
                            url: "cflowerdis.php", // PHP file to handle AJAX request for colors
                            type: "POST",
                            data: {cid: category_id},
                            success: function (response) {
                                $("#data").html(response);  // Update the color dropdown
                            }
                        });

                        $("#color").change(function () {

                            $("#data").html("");
                            var color_id = $(this).val();
                            var cid = $("#category").val();

                            $.ajax({
                                url: "cflowerdis.php", // PHP file to handle AJAX request for colors
                                type: "POST",
                                data: {cid: category_id, colorid: color_id},
                                success: function (response) {
                                    $("#data").html(response);  // Update the color dropdown
                                }
                            });

                        });
//                         $("#color").change(function () {
//                            var color_id = $(this).val();
//                            var cid = $("#category").val();
// $('#colorflower').show();
//                            $.ajax({
//                                url: "cflowerdis.php", // PHP file to handle AJAX request for colors
//                                type: "POST",
//                                data: {cid: category_id, colorid: color_id},
//                                success: function (response) {
//                                    $("#colorflower").html(response);  // Update the color dropdown
//                                }
//                            });
//                            $("#colorflower").change(function () {
//                                 var fc_id = $(this).val();
//                                 $.ajax({
//                                url: "cflowerdis.php", // PHP file to handle AJAX request for colors
//                                type: "POST",
//                                data: {cid: category_id, colorid: color_id,fcid=:fc_id},
//                                success: function (response) {
//                                    $("#data").html(response);  // Update the color dropdown
//                                }
//                            });
//                            });
//                        });

                        $("#flower").change(function () {
                            $("#data").html("");
                            var flower = $(this).val();
                            var cid = $("#category").val();

                            $.ajax({
                                url: "cflowerdis.php", // PHP file to handle AJAX request for colors
                                type: "POST",
                                data: {flower: flower, cid: category_id},
                                success: function (response) {
                                    $("#data").html(response);  // Update the color dropdown
                                }
                            });
                        });
//                        $("#season").change(function () {
//                            $("#data").html("");
//                            var sid = $(this).val();
//                            var cid = $("#category").val();
//
//                            $.ajax({
//                                url: "cflowerdis.php", // PHP file to handle AJAX request for colors
//                                type: "POST",
//                                data: {sid: sid, cid: category_id},
//                                success: function (response) {
//                                    $("#data").html(response);  // Update the color dropdown
//                                }
//                            });
//                        });
                        $("#color,#flower").change(function () {

                            $("#data").html("");
                            var flower = $("#flower").val();
                            var colorid = $("#color").val();
                            var cid = $("#category").val();

                            $.ajax({
                                url: "cflowerdis.php", // PHP file to handle AJAX request for colors
                                type: "POST",
                                data: {flower: flower, cid: category_id, colorid: colorid},
                                success: function (response) {
                                    $("#data").html(response);  // Update the color dropdown
                                }
                            });
                        });

                    } else {
                        $('#color').hide();
                        $('#flower').hide();
//                        $('#season').show();
                        $('#type').show();
                        $("#data").html("");
//                        $('#season').hide();
//                         $('#colorflower').hide();
 $.ajax({
                            url: "cflowerdis.php", // PHP file to handle AJAX request for colors
                            type: "POST",
                            data: {cid: category_id},
                            success: function (response) {
                                $("#data").html(response);  // Update the color dropdown
                            }
                        });
//                        $("#season").change(function () {
//                            $("#data").html("");
//                            var sid = $(this).val();
//                            var cid = $("#category").val();
//
//                            $.ajax({
//                                url: "cflowerdis.php", // PHP file to handle AJAX request for colors
//                                type: "POST",
//                                data: {sid: sid, cid: category_id},
//                                success: function (response) {
//                                    $("#data").html(response);  // Update the color dropdown
//                                }
//                            });
//                        });
                        $("#type").change(function () {
                            $("#data").html("");
                            var type = $(this).val();
                            var cid = $("#category").val();

                            $.ajax({
                                url: "cflowerdis.php", // PHP file to handle AJAX request for colors
                                type: "POST",
                                data: {type: type, cid: category_id},
                                success: function (response) {
                                    $("#data").html(response);  // Update the color dropdown
                                }
                            });
                        });
                        
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="ilogo">


            <a href="../index.php">
                <img src="../cdn/shop/files/0fc34013-64d2-4011-be96-996a701b5f5e.jpg" alt="Phuler - Flower Shop Shopify Theme">
            </a>

        </div>
        <section class="welcome-section">
            <h1>Detail of products </h1>
            <p>view the products of the your flower shop with filtration.</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>

        <?php
        include 'header.php';
        ?>
        <div class="container">

            <div class="filter">
                <form method="post" action="">
                    <!-- category -->
                    <?php
                    $q = "select * from tblcategory";
                    $qu = mysqli_query($con, $q);
                    ?>
                    <select name="category" id="category">
                        <option value="">Select Category</option>
                        <?php
                        while ($r = mysqli_fetch_row($qu)) {
                            echo "<option value='" . "$r[0]" . "'>$r[1]</option>";
                        }
                        ?>
                    </select>
                    <!-- color -->
                    <?php
                    $qc = "select * from tblcolor";
                    $quc = mysqli_query($con, $qc);
                    ?>
                    <select name="color" id="color">
                        <option value="">Select Color</option>
                        <?php
                        while ($ro = mysqli_fetch_row($quc)) {
                            echo "<option value='" . "$ro[0]" . "'>$ro[1]</option>";
                        }
                        ?>
                    </select>
                    <?php
                    $qf = "select * from tblflower";
                    $quf = mysqli_query($con, $qf);
                    ?>
                    <select name="flower" id="flower">
                        <option value="">Select Flower</option>
                        <?php
                        while ($rof = mysqli_fetch_row($quf)) {
                            echo "<option value='" . "$rof[3]" . "'>$rof[3]</option>";
                        }
                        ?>
                    </select>
                    <?php
//                    $qfs = "select * from tblseason";
//                    $qufs = mysqli_query($con, $qfs);
                    ?>
<!--                    <select name="season" id="season">
                        <option value="">Select season</option>-->
                        <?php
//                        while ($rofs = mysqli_fetch_row($qufs)) {
//                            echo "<option value='" . "$rofs[0]" . "'>$rofs[1]</option>";
//                        }
                        ?>
<!--                    </select>-->
                     <?php
                    $qt = "select * from tbltype";
                    $qtr = mysqli_query($con, $qt);
                    ?>
                    <select name="type" id="type">
                        <option value="">Select Ocassion</option>
                        <?php
                        while ($rot = mysqli_fetch_row($qtr)) {
                            echo "<option value='" . "$rot[0]" . "'>$rot[1]</option>";
                        }
                        ?>
                    </select>
                    <!--<button type="submit" id="filter" name="filter">Filter</button>-->
                </form>
            </div>

            <!-- Flower List -->
            <div class="flower-list" id="data" name="data">


            </div>
        </div>


    </body>
</html>
