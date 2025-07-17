<?php
if (isset($_GET['orderId']) && isset($_GET['STATUS'])) {
    $orderId = intval($_GET['orderId']);
    $status = $_GET['STATUS'];

    $con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "UPDATE tblorder SET STATUS = '$status' WHERE O_ID = $orderId";
    if (mysqli_query($con, $query)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Invalid request.";
}
?>
