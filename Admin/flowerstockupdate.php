<?php 

$con = mysqli_connect("localhost", "root", "", "dbphpprojechflower");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['sid']) && isset($_GET['ups'])&& isset($_GET['rs'])) {
    $id = $_GET['sid'];
    $status = $_GET['ups'];
    $r=$_GET['rs'];
echo $id,$status;
    $t=$status+$r;
    $sql = "UPDATE tblstockmanagement SET UpdatedStock='$status',totalstock='$t' WHERE S_ID='$id'";

    if (mysqli_query($con, $sql)) {
        echo "success";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid input.";
}
mysqli_close($con);
?>
