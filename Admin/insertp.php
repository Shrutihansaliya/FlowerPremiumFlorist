<?php
session_start();
if (isset($_SESSION['usernamese'])) {
//    echo '<script>alert("fvgbhjnmk,l")</script>';
    echo '<script>window.location.replace("profile.php")</script>';
    exit();
}
?>
<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->

    <!-- Mirrored from phuler.myshopify.com/account/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 15:37:57 GMT -->
    <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

    <head>




       

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
        <style>
            .tables form {
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
            }

            .tables table {
                width: 100%;
                border-collapse: collapse;
            }

            .tables td, th {

                padding: 10px;
                text-align: left;
            }

            .tables input[type="text"],
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

            .tables input[type="submit"] {
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
            .tables label{
                font-weight: bold;
            }
            .tables input[type="submit"]:hover {
                background-color: #0056b3;
            }


            .radio-group {
                margin-bottom: 10px;
            }

            .radio-group label {
                margin-right: 10px;
            }


            .tables h1 {
                text-align: center;
                margin-top: 20px;
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
            <h1>Manage Provider</h1>
            <p> add the workers of the shop</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
         <?php
        include 'header.php';
        ?>
        <br>

        <div class="tables">
            <h1>Register provider detail</h1>
            <!--<form method="post" id="customer_login" ><input type="hidden" name="form_type" value="customer_login" /><input type="hidden" name="utf8" value="✓" />-->


                <form method="post" enctype="multipart/form-data">
                    <table>
<!--                        <tr>
                            <td>
                                <label>Flower id</label>
                            </td>
                            <td>
                                <input type="text" name="fid" placeholder="Enter flower id" title="please enter only number" pattern="^[0-9]*$" required="">
                            </td>
                        </tr>-->
                        <tr>
                            <td>
                                <label>Provider Name</label>
                            </td>
                            <td>
                                <input type="text" name="pname" placeholder="Enter Provider name" title="please enter only character" pattern="^[A-Za-z\s]*$" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Contact number</label>
                            </td>
                            <td>
                                <input type="text" name="pcno" placeholder="Enter Contact number" maxlength="10" title="please enter only number" pattern="\d{10}" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email id</label>
                            </td>
                            <td>
                                <input type="email" name="pemail" placeholder="Enter Email id" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                                <textarea name="paddress" placeholder="Enter Address" required=""></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>City</label>
                            </td>
                            <td>
                                <input type="text" name="pcity" pattern="^[A-Za-z]*$" placeholder="Enter city" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Pincode</label>
                            </td>
                            <td>
                                <input type="text" name="pcode" placeholder="Enter Pincode" pattern="\d{6}" maxlength="6" title="enter only 6 number" required="">
                            </td>
                        </tr>
<!--                        <tr>
                            <td>
                                <label>Photo</label>
                            </td>
                            <td>
                                <input type="file" name="photo" required="">
                            </td>
                        </tr>-->
                    </table>
    
                    <div class="button-box">
                        <div class="login-toggle-btn">
                            <input type="submit" name="btnsubmit" value="Submit" style="width:100px; background-color:green; color:white;" class="section-button">

                        </div>
                    </div>
                </form>
        </div>
    </body>

   
</html>
<?php
if (isset($_POST['btnsubmit'])) {
    echo '<script>alert("submit successfully");</script>';
//    $filename=$_FILES["photo"]["name"];
//                        $tempname=$_FILES["photo"]["tmp_name"];
//                        $folder="images/".$filename;
//                        move_uploaded_file($tempname,$folder);
//    $id = $_POST['fid'];
    $name = $_POST['pname'];
    $cno = $_POST['pcno'];
    $email = $_POST['pemail'];
    $address = $_POST['paddress'];
    $city = $_POST['pcity'];
    $pincode = $_POST['pcode'];

//    echo "<script>alert('$id,$name,$cno,$email,$address,$city,$pincode');</script>";

    $conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");

    $qu = "insert into tblprovider(NAME,CNO,EMAIL_ID,ADDRESS,CITY,PINCODE) values('$name','$cno','$email','$address','$city',$pincode);";
    $q = mysqli_query($conn, $qu);

    if ($q) {
        echo "<script>alert('insert successfully');</script>";
    } else {
        echo "<script>alert('not insert successfully');</script>";
        ;
    }
}
?>
