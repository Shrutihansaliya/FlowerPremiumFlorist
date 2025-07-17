<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
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

            form button {
                align-content: center;
                background-color: black;
                color: #fff;
                border: none;
                margin-left: 30px;
                border-radius: 4px;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            form button:hover {
                background-color: #0056b3;
            }

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

            .action-links a {
                color: #007bff;
                text-decoration: none;
                margin-right: 10px;
            }

            .action-links a:hover {
                text-decoration: underline;
            }

            .linku a{
                text-decoration: none;
                color: blue;
            }
            .linku a:hover{
                text-decoration: underline;
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
            <p>view,edit and add the delivery boy of the shop</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
        <?php
        include 'header.php';
        ?>
        <br><br>
        <form action="DDinsert.php"><table align="center" >
                <button type="submit" class="btnlink">Add the Staff</button>
        </form>
        <?php
        $c = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
        if (!$c) {
            die("error in code");
        }
        $qu = "select * from tbldeliveryboyregistration";
        $q = mysqli_query($c, $qu);
        echo "<table Border='all' style='border-collapse: collapse'>";

        echo "<tr>";
//        echo "<th>Username</th>";
        echo "<th>Name</th>";
        echo "<th>Gender</th>";
        echo "<th>DOB</th>";
        echo "<th>Contact no</th>";
        echo "<th>Email</th>";
        echo "<th>Designation</th>";
        echo "<th>Address</th>";
        echo "<th>City</th>";
        echo "<th>Pincode</th>";
        echo "<th>Photo</th>";
        echo "<th>Salary</th>";
        echo "<th>Status</th>";
        echo "<th>DateAdded</th>";
         echo "<th>Allocated pincode for delivery</th>";
        // echo "<th>Password</th>";
        echo "<th>action</th>";

        echo "</tr>";

        while ($r = mysqli_fetch_row($q)) {
            echo "<tr>";
//            echo "<td>", "$r[0]", "</td>";
            echo "<td>", "$r[1]", "</td>";
            echo "<td>", "$r[2]", "</td>";
            echo "<td>", "$r[3]", "</td>";
            echo "<td>", "$r[4]", "</td>";
            echo "<td>", "$r[5]", "</td>";
            echo "<td>", "$r[6]", "</td>";
            echo "<td>", "$r[7]", "</td>";
            echo "<td>", "$r[8]", "</td>";
            echo "<td>", "$r[9]", "</td>";
            echo "<td><img src='" . $r[10] . "' height='100px' width='100px'></td>";
            echo "<td>", "$r[11]", "</td>";
            echo "<td>", "$r[12]", "</td>";
            echo "<td>", "$r[13]", "</td>";
          //  echo "<td>", "$r[14]", "</td>";
 echo "<td>", "$r[15]", "</td>";
            echo "<td>", "<a href='DDchange.php?USERNAME={$r[0]}'>change password</a>", "   <br>", "<a href='DDupdate.php?USERNAME={$r[0]}'>Edit</a>", "</td>";

            echo "</tr>";
        }
        echo "</table>";
        ?>

        <?php
// Determine the class based on the status
//$imageClass = ($status === 'inactive') ? '' : 'blur';
        ?>
    </body>
</html>
