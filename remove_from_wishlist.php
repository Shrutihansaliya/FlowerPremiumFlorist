<?php
session_start();

// Check if `remove_id` is provided
if (isset($_POST['remove_id'])) {
    $remove_id = (int) $_POST['remove_id'];

    // Ensure the wishlist exists in the session
    if (isset($_SESSION['wishlist'])) {
        // Search for the item in the wishlist and remove it
        $key = array_search($remove_id, $_SESSION['wishlist']);
        if ($key !== false) {
            unset($_SESSION['wishlist'][$key]);
            // Reindex the array to maintain proper order
            $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
            echo "Item removed from wishlist.";
        } else {
            echo "Item not found in wishlist.";
        }
    } else {
        echo "Wishlist is empty.";
    }
} else {
    echo "Invalid request.";
}

// Redirect back to the wishlist page
header("Location: wishlist.php");
exit;
?>
