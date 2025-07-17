
<?php
//session_start();
include 'headerindex.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
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

        h1 {
            text-align: center;
        }

        /* Profile table styling */
        .profile-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Image and details container */
        .row-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .image-container {
            flex: 1;
            padding-right: 20px;
        }
        p{
            font-size: 25px;
            color: red;
        }
        .image-container img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .details-container {
            flex: 2;
        }

        /* Logout button styling */
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
    </style>
</head>
<body>
    <!-- BREADCRUMBS SECTION START -->
    <div class="breadcrumbs-section">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-inner ptb-20">
                            <nav aria-label="breadcrumbs">
                                <ul class="breadcrumb-list">
                                    <li><a href="../index.php" title="Back to the home page">Home</a></li>
                                    <li><span>Account</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SECTION END -->

    <div class="dsec">
        <?php
        if (!isset($_SESSION['UNAME'])) {
            echo '<script>alert("Please log in first.");</script>';
            echo '<script>window.location.replace("login.php")</script>';
            exit();
        } else {
            echo "<h1>Order Details</h1><br>";

            // Database connection
            $host = 'localhost';
            $db = 'dbphpprojechflower';
            $user = 'root';
            $pass = '';

            $conn = new mysqli($host, $user, $pass, $db);

            if ($conn->connect_error) {
                die("Connection failed: ");
            } else {
                $user_name = $_SESSION['UNAME'];
//               $query = "SELECT tblorder.O_ID,tblorder.O_DATE,tblorder.QUANTITY,tblorder.TOTAL_PRICE,tblorder.GST,tblorder.STATUS,tblorder.ORDER_TIME,tblorder.DELIVERY_CHAEGE,tblorder.P_TYPE ,tblorder.DELIVERY_DATE,tblorder.ADDRESS,tblflower.PHOTO,tblitem.PHOTO FROM tblorder inner join tblflower on tblorder.P_ID=tblflower.F_ID inner join tblitem on tblorder.P_ID=tblitem.ITEM_ID WHERE tblorder.UNAME = '$user_name'";
$query = "SELECT tblorder.O_ID,tblorder.ORDER_STATUS,tblorder.O_DATE,tblorder.QUANTITY,tblorder.TOTAL_PRICE,tblorder.GST,tblorder.STATUS,tblorder.ORDER_TIME,tblorder.DELIVERY_CHAEGE,tblorder.P_TYPE ,tblorder.DELIVERY_DATE,tblorder.ADDRESS,tblitem.PHOTO,tblitem.ITEM_ID FROM tblorder inner join tblitem on tblorder.P_ID=tblitem.ITEM_ID WHERE tblorder.UNAME = '$user_name'";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $photo = 'Admin/' . $row['PHOTO'];
                    $itemid=$row['ITEM_ID'];
                    echo '<div class="row-container">';
                    
                    // Image container
                    echo '<div class="image-container">';
                    echo "<img src='http://localhost/PhpProjectflower/$photo' alt='Product Image'>";
                    echo '</div>';
                    
                    // Details container
                    echo '<div class="details-container">';
                    echo '<div>Order ID: ' . $row['O_ID'] . '</div>';
                    echo '<div>Order Date: ' . $row['O_DATE'] . '</div>';
                    echo '<div>Quantity: ' . $row['QUANTITY'] . '</div>';
                    echo '<div>Total Price: ' . $row['TOTAL_PRICE'] . '</div>';
                    echo '<div>GST: ' . $row['GST'] . '</div>';
                    echo '<div>Delivery Charge: ' . $row['DELIVERY_CHAEGE'] . '</div>';
                    echo '<div>Order Time: ' . $row['ORDER_TIME'] . '</div>';
                    echo '<div>Delivery Date: ' . $row['DELIVERY_DATE'] . '</div>';
                    echo '<div>Address: ' . $row['ADDRESS'] . '</div>';
                    echo '<div>Payment Status: ' . $row['STATUS'] . '</div>';
                    echo '<br>';
                    
                   
if($row['ORDER_STATUS']==='Pending'){
     echo '<div><p>Order is not received!! </p></div>';
}
else{

     echo '<div><p>Order received successfully!! </p></div>';
     echo '<a href="feedback.php?itemid='.$itemid.'">Feedback</a>';
}
 echo '</div>';
  echo '</div>'; // End row container
}

                   
                }
            }
            mysqli_close($conn);
        
        ?>
        <a href="accountlogout.php">Log Out</a>
    </div>
    <?php
 
include 'aboutusfooter.php';

?>
</body>
</html>

