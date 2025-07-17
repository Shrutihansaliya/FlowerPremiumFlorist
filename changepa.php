<?php
//session_start();
include 'headerindex.php';
//  session_start();
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
         <div class="tables">
            <h1>Change password</h1>
        <form method="POST">
            <table>

                <tr>
                    <td> <label for="old_password">Old Password:</label></td>
                    <td><input type="password" id="old_password" name="old_password"  pattern="(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" required=""><br><br></td>
                </tr>

                <tr>
                    <td><label for="new_password">New Password:</label></td>
                    <td><input type="password" id="new_password" name="new_password"  pattern="(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" required=""><br><br></td>
                </tr>

                <tr>
                    <td> <label for="confirm_password">Confirm New Password:</label></td>
                    <td> <input type="password" id="confirm_password" name="confirm_password"  pattern="(?=.*[!@#$%^&*]).{8,}" title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)" required=""><br><br></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Change password" name="changepa"></td>
                </tr>
            </table>









        </form>
    </div>
        <?php
        // Connect to the database
       $username = $_SESSION['UNAME'];
//       echo "$username";
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
                $pq = "select PASSWORD from tblregistration_customer where UNAME='$username';";
                $p = mysqli_query($c, $pq);
//                $qu = "select Password from tbllogin where UNAME='$username';";
//                $q = mysqli_query($c, $qu);
//                

                echo "<table border=2px>";
                while ($r = mysqli_fetch_row($p)) {
                    echo "<tr>";
//                    echo "<td>", "$r[0]", "</td>";
                    $olddbp = "$r[0]";
                    echo "</tr>";
                }
                echo "</table>";
                $dnpass = password_verify($old, $olddbp);

                if ($dnpass) {
                       $quuu = "update tblregistration_customer set PASSWORD='$newp' where UNAME='$username' ";
                       
                    $quu = "update tbllogin set Password='$newp' where UNAME='$username' ";
                    $rr=mysqli_query($c,$quuu);
                     $rre=mysqli_query($c,$quu);
                  
                   
                    echo "<script>alert('password successfully change');" .
                  "window.location.href = 'profile.php'; </script>";
            echo "<script>alert('password id not match')</script>";
                } else {

                    echo "<script>alert('old password not match')</script>";
                }
            }
        }
        ?>
<?php
 
include 'aboutusfooter.php';

?>
    </body>
</html>
