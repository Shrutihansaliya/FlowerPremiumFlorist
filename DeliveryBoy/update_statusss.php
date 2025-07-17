<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
if (!$con) {
    die("Connection unsuccessful: " . mysqli_connect_error());
}

$orderId = $_GET['orderId']; 
$newStatus = $_GET['ORDER_STATUS']; 
$deliveryBoyUsername = $_SESSION['DUNAME']; 


$currentDate = date('Y-m-d');

if ($newStatus === 'Done') {

     

    $updateOrderQuery = "UPDATE tblorder SET ORDER_STATUS = 'Done', DELIVERY_DATE = '$currentDate' WHERE O_ID = '$orderId'";
    if (mysqli_query($con, $updateOrderQuery)) {
      
        $totalPriceQuery = "SELECT TOTAL_PRICE FROM tblorder WHERE O_ID = '$orderId'";
        $totalPriceResult = mysqli_query($con, $totalPriceQuery);
         if ($totalPriceRow = mysqli_fetch_assoc($totalPriceResult)) {
            $totalPrice = $totalPriceRow['TOTAL_PRICE'];
        $insertDeliveryQuery = "INSERT INTO tbldeliveryboy (S_USERNAME,O_ID, DELIVERYDATE,DELIVERYSTATUS,earning) 
                                VALUES ('$deliveryBoyUsername', '$orderId', '$currentDate', 'Done', '$totalPrice')
                                ON DUPLICATE KEY UPDATE DELIVERYDATE = '$currentDate'";
        if (mysqli_query($con, $insertDeliveryQuery)) {
            echo "Order marked as 'Done', delivery date updated in tblorder, and delivery record updated successfully.";
        } else {
            echo "Error inserting or updating delivery record: " . mysqli_error($con);
        }
    } else {
        echo "Error updating order status and delivery date in tblorder: " . mysqli_error($con);
    }
} }elseif ($newStatus === 'Pending') {
   
    $updateOrderQuery = "UPDATE tblorder SET ORDER_STATUS = 'Pending', DELIVERY_DATE = NULL WHERE O_ID = '$orderId'";
    if (mysqli_query($con, $updateOrderQuery)) {
      
        $deleteDeliveryQuery = "DELETE FROM tbldelieveryboy WHERE O_ID = '$orderId'";
        if (mysqli_query($con, $deleteDeliveryQuery)) {
            echo "Order status reverted to 'Pending', delivery date removed from tblorder, and delivery record removed.";
        } else {
            echo "Error removing delivery record: " . mysqli_error($con);
        }
    } else {
        echo "Error updating order status to 'Pending': " . mysqli_error($con);
    }
} else {
    echo "Invalid status.";
}

// Close the connection
mysqli_close($con);
?>
