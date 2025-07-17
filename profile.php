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
    /* Reset CSS */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f9fc;
        color: #333;
        line-height: 1.6;
    }

    /* Styling the container */
    .dsec {
        width: 70%;
        max-width: 900px;
        margin: 50px auto;
        padding: 30px 40px;
        background-color: #fff;
       border-radius: 13px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-left: 3px solid #007BFF;
        border-top: 3px solid #007BFF;
        font-size: 1rem;
    }
    h1{
        
        text-align: center;
        
    }
    /* Profile table styling */
    .profile-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .profile-table th, .profile-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        font-size: 1.1rem;
        text-align: left;
        color: #555;
    }

    .profile-table th {
        background-color: #f7f9fc;
        color: #007BFF;
        font-weight: bold;
    }

    .profile-table tr:nth-child(even) {
      
    }

    /* Styling the logout button */
    .dsec a {
        display: inline-block;
        padding: 12px 25px;
        background-color: #007BFF;
        color: #fff;
        font-size: 1rem;
        font-weight: bold;
        text-decoration: none;
       border-radius: 13px;
        transition: background-color 0.3s ease;
        margin-top: 20px;
        text-align: center;
    }

    .dsec a:hover {
        background-color: #0056b3;
    }
    .ar{
        display: block;
        text-decoration: none;
        font-size:33px;
    }
</style>
    </head>
    <body>
        <br>
<h1 >Profile</h1>
        <div class="dsec">
            
   
    <?php


if (!isset($_SESSION['UNAME'])) {
    echo '<script>alert("Please log in first.");</script>';
    echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
    exit();
} else {
    echo "<br><br>";
    
    
    // Database connection
    $host = 'localhost';
    $db = 'dbphpprojechflower';
    $user = 'root';
    $pass = '';

    

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " );
    } else {
        // Fetch user data
        
      
        $user_name = $_SESSION['UNAME'];
        $query = "SELECT * FROM tblregistration_customer WHERE UNAME = '$user_name'";
        
       

        $result = mysqli_query($conn, $query);

        // Check for SQL errors
        if (!$result) {
            echo "SQL Error: " . mysqli_error($conn);
       } 
            if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
      echo "<table style='width: 100%; border-collapse: collapse;'>";
//            echo "<tr><th style='text-align: left; padding: 8px;'>Field</th><th style='text-align: left; padding: 8px;'>Value</th></tr>";
           echo "<tr><td style='padding: 8px;'>Username:</td><td input type='text' style='padding: 8px;'>" . htmlspecialchars($row['UNAME']) . "</td></tr>";
          // echo "<tr><td style='padding: 8px;'>First Name:</td><td style='padding: 8px;'><input type='text' value='" . htmlspecialchars($row['FNAME']) . "' style='width: 100%;' readonly></td></tr>";
            echo "<tr><td style='padding: 8px;'>First Name:</td><td style='padding: 8px;'>" . htmlspecialchars($row['FNAME']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Middle Name:</td><td style='padding: 8px;'>" . htmlspecialchars($row['MNAME']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Last Name:</td><td style='padding: 8px;'>" . htmlspecialchars($row['LNAME']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Date of Birth:</td><td style='padding: 8px;'>" . htmlspecialchars($row['DOB']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Gender:</td><td style='padding: 8px;'>" . htmlspecialchars($row['GENDER']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Contact Number:</td><td style='padding: 8px;'>" . htmlspecialchars($row['CNO']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Address:</td><td style='padding: 8px;'>" . htmlspecialchars($row['ADDRESS']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>City:</td><td style='padding: 8px;'>" . htmlspecialchars($row['CITY']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Pincode:</td><td style='padding: 8px;'>" . htmlspecialchars($row['PINCODE']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Email ID:</td><td style='padding: 8px;'>" . htmlspecialchars($row['EMAILID']) . "</td></tr>";
            echo "<tr><td style='padding: 8px;'>Date Added:</td><td style='padding: 8px;'>" . htmlspecialchars($row['DATEADDED']) . "</td></tr>";
           echo "<tr><td style='padding: 8px;'><div class='ar'><a href='updateprofile.php'>change profile</a></div></td><td style='padding: 8px;'></td></tr>";
            echo "</table>";
            
        } else {
            echo '<script>alert("User not found!");</script>';
        }
   }
    
    // Close the connection
 mysqli_close($conn);
}
       

?>
             <a href="accountlogout.php">LogOut</a>
     <a href="changepa.php">change password</a>
     <a href="showorder.php">Show Order</a>
     
     </div>

<div>
    <br><!-- comment -->
</div>
<?php
 
include 'aboutusfooter.php';

?>
    </body>
</html>
