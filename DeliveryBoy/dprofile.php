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
                align-content: center;
                text-align: center;
                align: center;

                border-collapse: collapse;
                margin-top: 30px;
            }

            table th, table td {
                padding: 8px;
                align-content: center;
                text-align: center;
                border-bottom: 1px solid #ddd;
                font-size: 1.1rem;
                text-align: left;
                color: #555;
            }



            .update-link:hover {
                color: red;
                transform: translateY(-2px);
            }

            .logout-link{
                text-align: right;
            }
            .logout-link:hover {
                color: red;

                transform: translateY(-2px);
            }

            .logout-link:active {
                transform: translateY(1px);
            }



        </style>
    </head>
    <body>

        <?php
        include 'Dheader.php';
        ?>

        <?php
        $host = 'localhost';
        $db = 'dbphpprojechflower';
        $user = 'root';
        $pass = '';

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Connection failed: ");
        } else {
            // Fetch user data
            $delivery_boy_username = $_SESSION['DUNAME'];

            $query = "SELECT * FROM tbldeliveryboyregistration WHERE USERNAME = '$delivery_boy_username'";

            $result = mysqli_query($conn, $query);

            // Check for SQL errors
            if (!$result) {
                echo "SQL Error: " . mysqli_error($conn);
            }
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                echo "<table style='border-collapse: collapse; margin: 30px auto;'>";

                echo "<tr><th>Username:</th><td>" . $row['USERNAME'] . "</td></tr>";
                echo "<tr><th>First Name:</th><td>" . $row['NAME'] . "</td></tr>";
                echo "<tr><th>Gender:</th><td>" . $row['GENDER'] . "</td></tr>";
                echo "<tr><th>Date of Birth:</th><td>" . $row['DOB'] . "</td></tr>";
                echo "<tr><th>Contact Number:</th><td>" . $row['CNO'] . "</td></tr>";
                echo "<tr><th>Email ID:</th><td>" . $row['EMAIL_ID'] . "</td></tr>";
                echo "<tr><th>Designation:</th><td>" . $row['DESIGNATION'] . "</td></tr>";
//<a href='updateprofile.php?USERNAME={$row['USERNAME']}' class='action-link update-link'>Update</a> 
                echo "<tr><td colspan='2'>  
               
                <a href='deliveryboylogout.php' class='action-link logout-link'>Logout</a> 
                </td></tr>";
                echo "</table>";
            } else {
                echo '<script>alert("User not found!");</script>';
            }
        }

        mysqli_close($conn);
        ?>

    </body>
</html>
