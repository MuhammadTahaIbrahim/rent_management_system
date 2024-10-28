<?php
session_start();
include("config.php"); // Database connection

// Check if product_id is provided
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);
    
    // Remove product from wishlist if it exists
    if (isset($_SESSION['wishlist'])) {
        $key = array_search($product_id, $_SESSION['wishlist']);
        
        if ($key !== false) {
            unset($_SESSION['wishlist'][$key]);
            $_SESSION['wishlist'] = array_values($_SESSION['wishlist']); // Reindex the array
        }
    }
    
    // Redirect back to wishlist page
    header("Location: uwishlist.php");
    exit();
} else {
    // echo "No Product ID provided.";
}
?>
