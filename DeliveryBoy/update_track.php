<?php
$con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['order_id']) && isset($_POST['ordertrack'])) {
    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);
    $ordertrack = mysqli_real_escape_string($con, $_POST['ordertrack']);

    if (empty($order_id) || empty($ordertrack)) {
        echo "Invalid input data.";
        exit();
    }

    // Update the order track status in the database
    $sql = "UPDATE tbldeliveryboy SET ordertrack='$ordertrack' WHERE O_ID='$order_id'";

    if (mysqli_query($con, $sql)) {
        echo "Order track updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} else {
    echo "Invalid input.";
}

mysqli_close($con);
?>
