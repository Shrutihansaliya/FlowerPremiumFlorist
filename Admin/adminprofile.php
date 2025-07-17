<?php
session_start();
if (!isset($_SESSION["adminuser"])) {
//    echo '<script>alert("fvgbhjnmk,l")</script>';
//    echo '<script>window.location.replace("http://localhost/PhpProjectflower/account/login.php")</script>';
    echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop Admin Panel</title>
    <!--<link rel="stylesheet" href="styles.css">-->
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
             body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .profile-container {
            width: 60%;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .profile-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .profile-body {
            padding: 20px;
        }

        .profile-body h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .profile-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        .profile-table th,
        .profile-table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .profile-table td input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .profile-table td input[readonly] {
            background-color: #f4f4f4;
            color: #333;
        }

        .profile-footer {
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
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
            <h1>Welcome to the Admin Panel</h1>
        <p>profile of the admin</p>
       
            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
        
        <?php
        include 'header.php';
        ?>

     <div class="profile-container">
        
        <div class="profile-body">
            <h3>Profile Details</h3>
            <table class="profile-table">
                <tr>
                    <td>Username:</td>
                    <td><input type="text" value="Bharatbhai123" readonly></td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" value="bharatbhai" readonly></td>
                </tr>
                <tr>
                    <td>Middle Name:</td>
                    <td><input type="text" value="shyamjibhai" readonly></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" value="sutariya" readonly></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="text" value="12-03-1979" readonly></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><input type="text" value="male" readonly></td>
                </tr>
                <tr>
                    <td>Contact Number:</td>
                    <td><input type="text" value="12345555666" readonly></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" value="E-2013, Rajhans Residency, Simada, Surat" readonly></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" value="Surat" readonly></td>
                </tr>
                <tr>
                    <td>Pincode:</td>
                    <td><input type="text" value="395006" readonly></td>
                </tr>
                <tr>
                    <td>Email ID:</td>
                    <td><input type="email" value="ert@gmail.com" readonly></td>
                </tr>
                <tr>
                    <td>Date Added:</td>
                    <td><input type="text" value="12-03-1979" readonly></td>
                </tr>
            </table>
        </div>
        
    </div>
</body>
</html>
