<?php
// Start session to manage wishlist
session_start();

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "dbphpprojechflower");

// Check database connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize wishlist in session if not already set
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

// Check if product_id is provided in the request
if (isset($_GET['product_id'])) {
    $product_id = (int) $_GET['product_id']; // Cast to integer for safety

    // Query to check if the product exists in the database
    $query = "SELECT * FROM tblitem WHERE ITEM_ID = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind the product ID to the query and execute
        mysqli_stmt_bind_param($stmt, "i", $product_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if a product is found
        if ($product = mysqli_fetch_assoc($result)) {
            // Add product to wishlist if not already present
            if (!in_array($product_id, $_SESSION['wishlist'])) {
                $_SESSION['wishlist'][] = $product_id;
                echo '<script>alert("Product added to wishlist.")</script>';
            } else {
                echo '<script>alert("Product is already in the wishlist.")</script>';
            }
        } else {
            echo '<script>alert("Invalid product.")</script>';
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare query: " . mysqli_error($conn);
    }
} else {
    echo '<script>alert("No product selected.")</script>';
}

// Close the database connection
echo '<script>window.location.replace("wishlist.php")</script>';
//header("location:wishlist.php");
mysqli_close($conn);
?>
