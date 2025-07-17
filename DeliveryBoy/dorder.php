<?php
session_start();
if (!isset($_SESSION["DUNAME"])) {
//    echo '<script>alert("fvgbhjnmk,l")</script>';
//    echo '<script>window.location.replace("http://localhost/PhpProjectflower/account/login.php")</script>';
    echo '<script>window.location.replace("http://localhost/PhpProjectflower/login.php")</script>';
    exit();
}


$delivery_boy_username = $_SESSION['DUNAME'];

$con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
if (!$con) {
    die("Connection unsuccessful: " . mysqli_connect_error());
}
$queryss = "SELECT tblorder.*, tblitem.NAME, tblitem.photo, tblorder.STATUS
            FROM tblorder 
            INNER JOIN tbldeliveryboyregistration ON tblorder.UNAME_DBOY = tbldeliveryboyregistration.USERNAME 
            INNER JOIN tblitem ON tblorder.p_id = tblitem.ITEM_ID 
            WHERE tbldeliveryboyregistration.USERNAME = '$delivery_boy_username'";

$qrt = mysqli_query($con, $queryss);
?>
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

            .ilogo {
                float: left;
                width: 250px;
                padding: 10px 20px 10px 20px;
            }

            table {
                
                width: 95%;
                margin-top: 30px;
                border-collapse: collapse;
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
                margin-left: 50px;
            }

            table th, table td {
                padding: 12px 15px;
                text-align: center;
                color: #333;
            }

            table th {
                background-color: #343a40;
                color: white;
                font-weight: bold;
            }

            table tr {
                border-bottom: 1px solid #ddd;
            }

            table tr:hover {
                background-color: #f1f1f1;
            }

            table tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            table td a {
                text-decoration: none;
                color: #007bff;
                font-weight: bold;
            }

            table td a:hover {
                color: #0056b3;
            }
        </style> 
       <script>
    // Function to update STATUS
    function updateStatus(orderId) {
        var xhr = new XMLHttpRequest();
        var status = document.querySelector(`input[name='STATUS_${orderId}']:checked`).value;
        xhr.open("GET", `update_status.php?orderId=${orderId}&STATUS=${status}`, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                // Update the STATUS display dynamically
                document.getElementById(`status_display_${orderId}`).innerHTML = status;
            }
        };
        xhr.send();
    }

    
    function updateOrderStatus(orderId) {
        var xhr = new XMLHttpRequest();
        var orderStatus = document.querySelector(`input[name='ORDER_STATUS_${orderId}']:checked`).value;
        xhr.open("GET", `update_statusss.php?orderId=${orderId}&ORDER_STATUS=${orderStatus}`, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                // Update the ORDER_STATUS display dynamically
                document.getElementById(`order_status_display_${orderId}`).innerHTML = orderStatus;
            }
        };
        xhr.send();
    }
</script>
  </head>
    <body>

<?php include 'Dheader.php'; ?>

<table border="1" style="border-collapse: collapse" class="cent">
    <tr>
        <th>Customer name</th>
        <th>Product Name</th>
        <th>Order Date</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Payment type</th>
        <th>Address</th>
        <th>Payment Status</th>
       
        <th>Order Status</th>
        
    </tr>

    <?php while ($r = mysqli_fetch_assoc($qrt)): ?>
        <tr>
            <td><?= $r['UNAME']; ?></td>
            <td><?= $r['NAME']; ?></td>
            <td><?= $r['O_DATE']; ?></td>
            <td><?= $r['QUANTITY']; ?></td>
            <td><?= $r['TOTAL_PRICE']; ?></td>
            <td><?= $r['P_TYPE']; ?></td>
            <td><?= $r['ADDRESS']; ?></td>
           
            <td>
                <input type="radio" name="STATUS_<?= $r['O_ID']; ?>" value="Pending" <?= $r['STATUS'] === 'Pending' ? 'checked' : ''; ?>> Pending
                <input type="radio" name="STATUS_<?= $r['O_ID']; ?>" value="Done" <?= $r['STATUS'] === 'Done' ? 'checked' : ''; ?>> Done
                <button onclick="updateStatus(<?= $r['O_ID']; ?>)">Update</button>
            </td>
           
            <td>
                <input type="radio" name="ORDER_STATUS_<?= $r['O_ID']; ?>" value="Pending" <?= $r['ORDER_STATUS'] === 'Pending' ? 'checked' : ''; ?>> Pending
                <input type="radio" name="ORDER_STATUS_<?= $r['O_ID']; ?>" value="Done" <?= $r['ORDER_STATUS'] === 'Done' ? 'checked' : ''; ?>> Done
                <button onclick="updateOrderStatus(<?= $r['O_ID']; ?>)">Update</button>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
