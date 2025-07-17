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
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px auto;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }

            th, td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: black;
                color: white;
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
            <h1>Detail of Customers</h1>
            <p>view the detail of registered customers.</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>

        <?php
        include 'header.php';
        ?>
        <?php
        // put your code here
        echo '<br>';
        $qp = "select * from tblregistration_customer";
        $qpa = mysqli_query($conn, $qp);
        echo '<table Border="all" style="border-collapse: collapse"><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Date of Birth</th><th>Gender</th><th>Cno</th><th>Address</th><th>City</th><th>Pincode</th><th>Email</th><th>Date added</th>';
            
        while ($r = mysqli_fetch_assoc($qpa)) {

            $uname = $r['UNAME'];
            $fname = $r['FNAME'];
            $mname = $r['MNAME'];
            $lname = $r['LNAME'];
            $dob = $r['DOB'];
            $gender=$r['GENDER'];
            $cno=$r['CNO'];
            $address=$r['ADDRESS'];
            $city=$r['CITY'];
            $pin=$r['PINCODE'];
            $email=$r['EMAILID'];
            $dateadded=$r['DATEADDED'];
            
//            echo '<br>';
            echo '<tr><td>'.$fname.'</td><td>'.$mname.'</td>
                    <td>'.$lname.'</td><td>'.$dob.'</td><td>'.$gender.'</td><td>'.$cno.'</td><td>'.$address.'</td><td>'.$city.'</td><td>'.$pin.'</td><td>'.$email.'</td><td>'.$dateadded.'</td>
                </tr>';
        }
        echo '</table>';
        ?>
    </body>
</html>
