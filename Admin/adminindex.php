<?php
session_start();
if (!isset($_SESSION["adminuser"])) {
//    echo '<script>alert("fvgbhjnmk,l")</script>';
    echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
    exit();
}
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower")or die("not connect");
?>
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
.admin-content {
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
        <p>Manage your flower shop efficiently with our powerful admin tools.</p>
       
            <div class="user-links">
                <a href="adminprofile.php">Profile</a>
                <a href="adminlogout.php">Logout</a>
            </div>
        </section>
        
        <?php
        include 'header.php';
        ?>
               
 <section class="admin-content">
        <div class="card">
            <h3>Total Orders</h3>
            <?php
            $q="select * from tblorder";
            $qu=mysqli_query($conn,$q);
            $count=mysqli_num_rows($qu);
            ?>
            <p><?php echo $count;?></p>
        </div>
        <div class="card">
            <h3>Total Users</h3>
             <?php
            $q1="select * from tblregistration_customer";
            $qu1=mysqli_query($conn,$q1);
            $countu=mysqli_num_rows($qu1);
            ?>
            <p><?php echo $countu;?></p>
        </div>
        <div class="card">
            <h3>Pending Orders</h3>
             <?php
            $q2="select * from tblorder where ORDER_STATUS='Pending'";
            $qu2=mysqli_query($conn,$q2);
            $countpo=mysqli_num_rows($qu2);
            ?>
            <p><?php echo $countpo;?></p>
        </div>
        <div class="card">
            <?php
            $q3="select * from tblorder where STATUS='Done' and P_TYPE='Cash on delivery'";
            $qu3=mysqli_query($conn,$q3);
//            $countr=mysqli_num_rows($qu3);
            $revenue=0;
            while($r=mysqli_fetch_row($qu3)){
                $revenue+=$r[6];
            }
            ?>
            <h3>Revenue</h3>
            <p><?php echo $revenue;?></p>
        </div>
    </section>
    
</body>
</html>
