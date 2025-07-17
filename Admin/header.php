<!--pattern="(?=.*[!@#$%^&*]).{8,}" 
title="Password must be at least 8 characters long and contain at least one special character (!@#$%^&*)"-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop Admin Panel</title>
    <!--<link rel="stylesheet" href="styles.css">-->
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
    position: relative;
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
.nav-links .dropdown-content {
    display: none;
    position: absolute;
    background-color: #444;
    min-width: 160px;
    z-index: 1;
    top: 100%;
}

.nav-links .dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    white-space: nowrap;
}

.nav-links .dropdown-content a:hover {
    background-color: #555;
}

.nav-links .dropdown:hover .dropdown-content {
    display: block;
}

.nav-links .dropbtn:hover {
    background-color: #555;
}

/* User links 
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
    padding: 0px 20px 0px 20px;
}

 Welcome section 
.welcome-section {
    text-align: center;
    padding: 40px 10px;
   
    padding:20px 0px 40px 0px;
    margin-left: 0px;
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
}*/

    </style>
</head>
<body>
<!--   
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
    </section>-->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">Admin Panel</a>
            </div>
            <ul class="nav-links">
                <li><a href="adminindex.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Orders</a>
                    <div class="dropdown-content">
                        <a href="allorder.php">All Orders</a>
                        <a href="pendingorder.php">Pending Orders</a>
                        <a href="completedorder.php">Completed Orders</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Products</a>
                    <div class="dropdown-content">
                        <a href="product.php">All Products</a>
                        <a href="insertproduct.php">Add New Product</a>
<!--                        <a href="#">Manage Categories</a>-->
                    </div>
                </li>
                 
                <li class="dropdown">
                    <a href="#" class="dropbtn">Customers</a>
                    <div class="dropdown-content">
                        <a href="registeredcustomer.php">Registered Customer</a>
                        <a href="orderercustomer.php">An orderer customer</a>
                        
                    </div>
                </li>
                    <li class="dropdown">
                    <a href="#" class="dropbtn">Staff</a>
                    <div class="dropdown-content">
                        <a href="staffview.php">Manage Workers</a>
                        <a href="DDview.php">Manage Deliveryboys</a>
                        
                    </div>
                </li>
                
                
<!--                 <li><a href="flowerstock.php">Flower stock</a></li>-->
<li class="dropdown">
                    <a href="#" class="dropbtn">Stock Management</a>
                    <div class="dropdown-content">
                        <a href="flowerstock.php">Flower Stock</a>
                        <a href="itemstock.php">Item stock</a>
                        
                    </div>
                </li>
                 <li><a href="viewp.php">Providers</a></li>
                 <li><a href="feedbackshow.php">Feedback</a></li>
                  <li><a href="viewpayment.php">Payment</a></li>
                  <!--<li><a href="#">Contact</a></li>-->
                  <!--<li><a href="#">About</a></li>-->
                
            </ul>
            
        </nav>
    </header>
</body>
</html>