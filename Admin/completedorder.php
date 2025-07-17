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
            <h1>Order Detail</h1>
            <p>Manage completed order of the customers with our powerful admin tools.</p>

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
        $qp = "select * from tblorder where STATUS='received'";
        $qpa = mysqli_query($conn, $qp);
        echo '<table Border="all" style="border-collapse: collapse"><th>Username</th><th>Order Date</th><th>Item Quantity</th><th>Price</th><th>Total price</th><th>GST</th><th>Discount</th><th>Payment Date</th><th>Order Status</th><th>Order time</th><th>Payment type</th><th>Deliveryboy name</th>';
            
        while ($r = mysqli_fetch_assoc($qpa)) {

            $uname = $r['UNAME'];
            $odate = $r['O_DATE'];
            $quantity = $r['QUANTITY'];
            $price = $r['PRICE'];
            $totalprice = $r['TOTAL_PRICE'];
            $gst=$r['GST'];
            $discount=$r['DISCOUNT'];
            $pdate=$r['PAY_DATE'];
            $status=$r['STATUS'];
            $otime=$r['ORDER_TIME'];
            $ptype=$r['P_TYPE'];
            $dboyname=$r['UNAME_DBOY'];
            
//            echo '<br>';
            echo '<tr><td>'.$uname.'
                </td><td>'.$odate.'</td><td>'.$quantity.'</td>
                    <td>'.$price.'</td><td>'.$totalprice.'</td><td>'.$gst.'</td><td>'.$discount.'</td><td>'.$pdate.'</td><td>'.$status.'</td><td>'.$otime.'</td><td>'.$ptype.'</td><td>'.$dboyname.'</td>
                </tr>';
        }
        echo '</table>';
        ?>
    </body>
</html>
