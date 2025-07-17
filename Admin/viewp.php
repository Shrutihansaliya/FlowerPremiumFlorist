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
/*form*/
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
            <h1>Manage Provider</h1>
            <p>view,edit and add the workers of the shop</p>

            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
       <?php
        include 'header.php';
        ?>
        <br><br>
        <form action="../Admin/insertp.php"><table align="center" >
                <button type="submit" class="btnlink">Add the Staff</button>
        </form>


        <?php
        $conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
        if (!$conn) {
            echo '<script>alert("Some Went Wrong While Connecting server.");</script>';
        } else {
            $qu = "select * from tblprovider";
            $q = mysqli_query($conn, $qu);

            echo '<table Border="all" style="border-collapse: collapse"><th>Name</th><th>Cno</th><th>Email</th><th>Address</th><th>City</th><th>Pincode</th><th>Action</th>';
            while ($r = mysqli_fetch_assoc($q)) {
                $pid = $r['P_ID'];
//                $id = $r['ID'];
                $name = $r['NAME'];
                $cno = $r['CNO'];
                $email = $r['EMAIL_ID'];
                $address = $r['ADDRESS'];
                $city = $r['CITY'];
                $pin = $r['PINCODE'];
//                $photo=$r['photo'];
                echo "<tr>";
                //echo "<td>$pid </td>";
//                 echo "<td> $id</td>";
                  echo "<td>$name</td>";
                   echo "<td>$cno</td>";
                    echo "<td>$email</td>";
                     echo "<td>$address</td>";
                      echo "<td>$city </td>";
                       echo "<td>$pin</td>";
//                        echo "<td><img src='".$photo."' height='100px' width='100px'></td>";
//                echo '<tr><td>' . $pid . '</td><td>' . $id . '</td><td>' . $name . '</td><td>' . $cno . '</td><td>' . $email . '</td><td>' . $address . '</td><td>' . $city . '</td><td>' . $pin . '</td><td>'.$photo.'</td>';
                echo '<td class="linku">';
                echo "<a href='../Admin/updatep.php?id=" . $pid . "'>Update</a>" . '</td></tr>';

//                                                echo "$pid,$id,$name,$cno,$email,$address,$city,$pin";
            }
            echo '</table>';
        }
        ?>
    </body>

   
</html>
