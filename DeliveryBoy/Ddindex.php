<?php
session_start();
if (!isset($_SESSION["DUNAME"])) {
//    echo '<script>alert("fvgbhjnmk,l")</script>';
//    echo '<script>window.location.replace("http://localhost/PhpProjectflower/account/login.php")</script>';
    echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
    exit();
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower") or die("not connect");
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delivery Boy Dashboard</title>
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
        </style>
    </head>
    <body>

       


        <?php
        include 'Dheader.php';
        ?>



        <!-- Dashboard Content -->
        <section class="dashboard-content">
            <div class="card">
                <h3>Total Delievery</h3>
                <?php
                $q = "select * from tblorder where UNAME_DBOY='{$_SESSION["DUNAME"]}'";
                $qu = mysqli_query($conn, $q);
                $count = mysqli_num_rows($qu);
                ?>
                <p><?php echo $count; ?></p>
            </div>
            <div class="card">
                <h3>Pending Deliveries</h3>
                <?php
                $pq = "select * from tblorder where ORDER_STATUS='Pending' and UNAME_DBOY='{$_SESSION["DUNAME"]}'";
                $pqu = mysqli_query($conn, $pq);
                $countpend = mysqli_num_rows($pqu);
                ?>
                <p><?php echo $countpend; ?></p>
            </div>
            <div class="card">
                <h3>Completed Deliveries</h3>
                <?php
                $ddq = "select * from tblorder where STATUS='Done' and UNAME_DBOY='{$_SESSION["DUNAME"]}'";
                $dqu = mysqli_query($conn, $ddq);
                $countdone = mysqli_num_rows($dqu);
                ?>
                <p><?php echo $countdone; ?></p>
            </div>
            <div class="card">
                <h3>Earnings</h3>
                <?php
                $qe = "select * from tbldeliveryboy where S_USERNAME='{$_SESSION["DUNAME"]}'";
                $que = mysqli_query($conn, $qe);
                $totalearning = 0;
                while ($r = mysqli_fetch_row($que)) {
                    $totalearning += $r[5];
                }
                ?>
                <p><?php echo $totalearning; ?></p>
            </div>
        </section>

    </body>
</html>
