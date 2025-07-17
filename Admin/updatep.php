

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
            .tables a {
                text-decoration: none;
                color: #007bff;
            }
            .tables a:hover {
                text-decoration: underline;
                color: #0056b3;
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
            <h1>Manage Provider</h1>
            <p>edit the workers of the shop</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
        <?php
        include 'header.php';
        ?>


        <?php
        $pid = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
        if (!$conn) {
            echo '<script>alert("Some Went Wrong While Connecting server.");</script>';
        } else {
            $qu = "select * from tblprovider where P_ID=$pid";
            $q = mysqli_query($conn, $qu);

            while ($r = mysqli_fetch_assoc($q)) {
//                $pid = $r['P_ID'];
                $id = $r['P_ID'];
                $name = $r['NAME'];
                $cno = $r['CNO'];
                $email = $r['EMAIL_ID'];
                $address = $r['ADDRESS'];
                $city = $r['CITY'];
                $pin = $r['PINCODE'];
            }
        }
        ?>
        <div class="tables">
            <br>
            <h1>Edit provider detail</h1>
            <form method="post">
                <table>
                    <tr>
                        <td>

                            <label>provider id</label>
                        </td>
                        <td>
                            <?php
                            echo $pid;
                            ?>
                        </td>
                    </tr>
<!--                    <tr>
                        <td>
                            <label>Flower id</label>
                        </td>
                        <td>
                            <input type="text" name="fids" required="" title="please enter only number" pattern="^[0-9]*$" value="<?php echo $id ?>">
                        </td>
                    </tr>-->
                    <tr>
                        <td>
                            <label>Provider Name</label>
                        </td>
                        <td>
                            <input type="text" name="pname" required="" title="please enter only character" pattern="^[A-Za-z\s]*$" value="<?php echo $name ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Contact number</label>
                        </td>
                        <td>
                            <input type="text" name="pcno" required="" maxlength="10" title="please enter only number" pattern="\d{10}" value="<?php echo $cno ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email id</label>
                        </td>
                        <td>
                            <input type="email" name="pemail" required="" value="<?php echo $email ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Address</label>
                        </td>
                        <td>
                            <textarea name="paddress"><?php echo $address ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>City</label>
                        </td>
                        <td>
                            <input type="text" name="pcity" pattern="^[A-Za-z]*$" placeholder="enter city" required=""value="<?php echo  $city ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Pincode</label>
                        </td>
                        <td>
                            <input type="text" name="pcode" required="" pattern="\d{6}" maxlength="6" title="enter only 6 number" value="<?php echo $pin ?>">
                        </td>
                    </tr>
                </table>

                <div class="button-box">
                    <div class="login-toggle-btn">
                        <input type="submit" name="btnsubmit" value="Submit" style="width:100px; background-color:green; color:white;" class="section-button">

                    </div>
                </div>

            </form>
        </div>

    </body>
    <?php
    if (isset($_POST['btnsubmit'])) {
//        $fid = $_POST['fids'];
        $pnames = $_POST['pname'];
        $pcnos = $_POST['pcno'];
        $pemails = $_POST['pemail'];
        $paddress = $_POST['paddress'];
        $pcitys = $_POST['pcity'];
        $pcodes = $_POST['pcode'];

        $conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");

        $qu = "update tblprovider set NAME='$pnames',CNO='$pcnos',EMAIL_ID='$pemails',ADDRESS='$paddress',CITY='$pcitys',PINCODE=$pcodes where P_ID=$pid;";
        $q = mysqli_query($conn, $qu);

        if ($q) {
            echo "<script>alert('update successfully');</script>";
            echo '<script>window.location.replace("viewp.php")</script>';
        } else {
            echo "<script>alert('not update successfully');</script>";
        }
    }
    ?>

    <!-- Mirrored from phuler.myshopify.com/account/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Jul 2024 15:38:06 GMT -->
</html>
