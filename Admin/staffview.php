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

            /*        .form {
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                        max-width: 600px;
                        margin: 20px auto;
                        display: flex;
                        justify-content: flex-end;
                    }*/

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
            /*
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }*/

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
            <h1>Manage Worker</h1>
            <p>view,edit and add the workers of the shop</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
        <?php
        include 'header.php';
        ?>
        <br>
        <br>

        <form action="staffinsert.php"><table align="center" >
                <button type="submit" class="btnlink">Add the Staff</button>
        </form>

        <?php
        $con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
        if (!$con) {
            die("Connection unsuccessful: " . mysqli_connect_error());
        }

        $queryss = "select * from tblstaff where status='active'";
        $qrt = mysqli_query($con, $queryss);
        echo "<table Border='all' style='border-collapse: collapse' >";
        echo "<tr>";
//        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Gender</th>";
        echo "<th>DOB</th>";
        echo "<th>Contact no</th>";
        echo "<th>Email</th>";
        echo "<th>Designation</th>";
        echo "<th>Address</th>";
        echo "<th>City</th>";
         echo "<th>Pin code</th>";
          echo "<th>Photo</th>";
        echo "<th>Salary</th>";
        echo "<th>Status</th>";
        echo "<th>Dateadded</th>";
        echo "<th>Action</th>";

        echo "</tr>";
        while ($r = mysqli_fetch_row($qrt)) {
            echo "<tr>";
            $id=$r[0];
//            echo "<td> $r[0] </td>";
            echo "<td> $r[1] </td>";
            echo "<td> $r[2] </td>";
            echo "<td> $r[3] </td>";
            echo "<td> $r[4] </td>";
            echo "<td> $r[5] </td>";
            echo "<td> $r[6] </td>";
            echo "<td> $r[7] </td>";
            echo "<td> $r[8] </td>";
            echo "<td> $r[9] </td>";
             echo "<td><img src='".$r[10]."' height='100px' width='100px'></td>";
             echo "<td> $r[11] </td>";
              echo "<td> $r[12] </td>";
               echo "<td> $r[13] </td>";
                
                 
            echo "<td class='linku'> <a href='staffupdate.php?id={$id}'>Update</a></td>";

            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
