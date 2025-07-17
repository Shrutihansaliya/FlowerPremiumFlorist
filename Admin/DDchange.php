<!DOCTYPE html>
<html>
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
                width: auto;
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
            <h1>Manage Delivery Boy</h1>
            <p>change password of the profile of the delivery boy </p>
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
            <h1>change password</h1>
        <form method="POST">
            <table>

                <tr>
                    <td> <label for="old_password">Old Password:</label></td>
                    <td><input type="password" id="old_password" name="old_password" pattern="(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" required=""><br><br></td>
                </tr>

                <tr>
                    <td><label for="new_password">New Password:</label></td>
                    <td><input type="password" id="new_password" name="new_password" pattern="(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" required=""><br><br></td>
                </tr>

                <tr>
                    <td> <label for="confirm_password">Confirm New Password:</label></td>
                    <td> <input type="password" id="confirm_password" name="confirm_password" pattern="(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" required=""><br><br></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Change password" name="changepa"></td>
                </tr>
            </table>









        </form>
    </div>
        <?php
        // Connect to the database
        $username = $_REQUEST['USERNAME'];
        $c = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
        if (!$c) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if (isset($_POST['changepa'])) {
            $old = $_POST["old_password"];
            $new = $_POST["new_password"];
            $cnew = $_POST["confirm_password"];

            $newp = password_hash($cnew, PASSWORD_DEFAULT);

            if ($new != $cnew) {
                echo "<script>alert('conform password not match')</script>";
            } else {
                //$oldp = password_hash($old, PASSWORD_DEFAULT);
                $qu = "select PASSWORD from tbldeliveryboyregistration where USERNAME='$username';";
                $q = mysqli_query($c, $qu);

                echo "<table border=2px>";
                while ($r = mysqli_fetch_row($q)) {
                    echo "<tr>";
//                    echo "<td>", "$r[0]", "</td>";
                    $olddbp = "$r[0]";
                    echo "</tr>";
                }
                echo "</table>";
                $dnpass = password_verify($old, $olddbp);

                if ($dnpass) {
                    $quu = "update tbldeliveryboyregistration set PASSWORD='$newp' where USERNAME='$username' ";
                    echo "<script>alert('password successfully change');" .
                    "window.location.href = 'DDview.php'; </script>";
//                    echo "<script>alert('password id not match')</script>";
                } else {

                    echo "<script>alert('old password not match')</script>";
                }
            }
        }
        ?>


    </body>
</html>
