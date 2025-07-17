<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();

if (!isset($_SESSION["DUNAME"])) {
    echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            /* General reset */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;
            }

            /* Navbar styles */
            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #333;
                padding: 15px 30px;
            }


            .logo a {
                color: white;
                text-decoration: none;
                font-size: 24px;
                font-weight: bold;

            }


            .nav-links {
                list-style-type: none;
                display: flex;
            }

            .nav-links li {
                margin-left: 20px;
            }

            .nav-links a {
                text-decoration: none;
                color: white;
                font-size: 16px;
                padding: 10px;
                display: block;
            }

            .nav-links a:hover {
                background-color: #555;
            }


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
                padding: 40px 10px;
                background-color: #f7f7f7;
            }

            .welcome-section h1 {
                font-size: 36px;
                color: #333;
                margin-bottom: 10px;
            }

            .welcome-section p {
                font-size: 18px;
                color: #666;
            }

            /* Dashboard content */
            .dashboard-content {
                display: flex;
                justify-content: space-around;
                padding: 40px;
            }

            .card {
                background-color: #fff;
                padding: 20px;
                width: 200px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
                border-radius: 8px;
            }

            .card h3 {
                font-size: 24px;
                color: #343a40;
                margin-bottom: 10px;
            }

            .card p {
                font-size: 22px;
                color: #495057;
            }

            .ilogo{
                float:left;
                width:250px;
                padding: 10px 20px 10px 20px;
            }
         table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

      table th, table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        font-size: 1.1rem;
        text-align: left;
        color: #555;
    }

    table th {
        background-color: #f7f9fc;
        color: #007BFF;
        font-weight: bold;
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
            input[type="number"],select,
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
            <h1>Welcome, John Doe</h1>
            <p>Track your deliveries, earnings, and profile here.</p>
            <div class="user-links">
                <a href="dprofile.php">Profile</a>
                <a href="deliveryboylogout.php">Logout</a>
            </div>
        </section>
        <?php
        include 'Dheader.php';
        ?>



        <?php
        $username = $_REQUEST['USERNAME'];
        $c = mysqli_connect("localhost", "root", "", "dbphpprojechflower");

        if (!$c) {
            die("error in code");
        }


        if (isset($_POST['btnupdate'])) {
            $username = $_POST["txtuname"];
            $name = $_POST["txtname"];
            $gender = $_POST["gender"];
            $dob = $_POST["dob"];
            $cno = $_POST["cno"];
            $email = $_POST["email"];
            $designation = $_POST["txtdesig"];
            $address = $_POST["txtadd"];
            $city = $_POST["city"];
            $pin = $_POST["txtpin"];
            $salary = $_POST["txtsalary"];
            $status = $_POST["status"];

            $date = $_POST["dateadd"];
//             $password = $_POST["txtpass"];
            $selectedPincodes = implode(",", $_POST['pincodede']);
            $qu = "update tbldeliveryboyregistration set NAME='$name',GENDER='$gender',DOB='$dob',CNO=$cno,EMAIL_ID='$email',DESIGNATION='$designation',ADDRESS='$address',CITY='$city',PINCODE=$pin,SALARY=$salary,STATUS='$status',DATEADDED='$date',PASSWORD='$password',pincodefordelivery=' $selectedPincodes' where USERNAME='$username'";
            $quee = mysqli_query($c, $qu);

            if (!$quee) {

                echo "<script>
               alert('Not update');
               
           </script>";
            } else {

                echo "<script>
                   alert('update successfully');
                   window.location.href = 'dprofile.php'; 
           </script>";
            }
        }


        $u = "select * from tbldeliveryboyregistration where USERNAME='$username';";
        $v = mysqli_query($c, $u);

        while ($r = mysqli_fetch_assoc($v)) {


            $username = $r["USERNAME"];

            $name = $r["NAME"];
            $g = $r["GENDER"];
            $dob = $r["DOB"];
            $cno = $r["CNO"];
            $email = $r["EMAIL_ID"];
            $designation = $r["DESIGNATION"];
            $address = $r["ADDRESS"];
            $city = $r["CITY"];
            $pin = $r["PINCODE"];
            $salary = $r["SALARY"];
            $status = $r["STATUS"];
            $date = $r["DATEADDED"];
            $password = $r["PASSWORD"];

            $savedPincodes = explode(",", $r['pincodefordelivery']);
        }
        ?>
        <div class="tables">
            <h1>Update profile Detail</h1>

            <form method="post">
                <table>



                    <tr>
                        <td>
                            <label>Username:</label> 
                        </td>
                        <td><input type="text" name="txtuname"  pattern="^[a-z A-Z 0-9]*$" title="you can enter the alpahabet and numbers" readonly value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>name:</label>
                        </td>
                        <td><input type="text" name="txtname" title=" enter the alpahabets only" pattern="^[a-zA-Z\s]*$" required="" placeholder="enter name" value="<?php echo $name; ?>"</td>
                    </tr>
                    <tr>
                        <td>
                            <label>Gender:</label>
                        </td>
                        <td><input type="radio" name="gender" value="Male"<?php if ($g == 'M') echo 'checked'; ?>>Male
                            <input type="radio" name="gender" value="Female"<?php if ($g == 'F') echo 'checked'; ?>>Female
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Date-of-Birth:</label> 
                        </td>
                        <td><input type="date" name="dob" required="" value="<?php echo $dob; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>Contact no:</label>
                        </td>
                        <td><input type="text" name="cno" pattern="^[0-9]*$" maxlength="10"  required="" title=" enter the numbers only" value="<?php echo $cno; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>Email_id:</label>
                        </td>
                        <td><input type="email" name="email" required="" placeholder="enter your email" value="<?php echo $email; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>Designation:</label>
                        </td>
                        <td><input type="text"  pattern="^[a-zA-Z\s]*$" title=" enter the alpahabets only" name="txtdesig" required="" value="<?php echo $designation; ?>"</td>
                    </tr>
                    <tr>
                        <td>
                            <label>Address:</label>
                        </td>
                        <td><input type="text"  name="txtadd" required="" value="<?php echo $address; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>City:</label> 
                        </td>
                        <td><input type="text" pattern="^[a-zA-Z]*$" title=" enter the alpahabets only" name="city" required="" value="surat" value="<?php echo $city; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>Pin code:</label> 
                        </td>
                        <td><input type="text" title=" enter the 6 number only" pattern="^[0-9]*$" maxlength="6" name="txtpin" required="" value="<?php echo $pin; ?>"</td>
                    </tr>


                    <tr>
                        <td>
                            <label>Salary:</label> 
                        </td>
                        <td><input type="text" name="txtsalary" pattern="^[0-9]*$" value="<?php echo $salary; ?>"</td>
                    </tr>

                    <tr>
                        <td>
                            <label>Status:</label> 
                        </td>
                        <td><input type="radio" name="status" value="active"<?php if ($status == 'active') echo 'checked'; ?>>Active
                            <input type="radio" name="status" value="inactive"<?php if ($status == 'inactive') echo 'checked'; ?>>Inactive
                        </td>
                    </tr>



                    <tr>
                        <td><label>Date added:</label></td>
                        <td><input type="date" name="dateadd" required="" value="<?php echo $date; ?>" ></td>
                    </tr>

<!--                     <tr>
    <td><label>password:</label></td>
    <td><input type="password" name="txtpass" required="" value="<?php echo $password; ?>" ></td>
</tr>
                    --><tr>
                        <td><label>Pincode For Delivery:</label></td>
                        <td><?php
                            $qt = "select * from tblpincode";
                            $qtr = mysqli_query($c, $qt);
                            ?>
                            <select name="pincodede[]"  multiple required="">
                                <!--                                          <option value=""></option>-->
                                <?php
// Display each pincode as an option, preselecting saved pincodes
                                while ($rot = mysqli_fetch_row($qtr)) {
                                    $selected = in_array($rot[0], $savedPincodes) ? 'selected' : '';
                                    echo "<option value='" . $rot[0] . "' $selected>" . $rot[0] . "</option>";
                                }
                                ?>
                            </select></td>

                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btnupdate" value="update" </td>

                    </tr>
                </table>

            </form> 
        </div>

    </body>
</html>
