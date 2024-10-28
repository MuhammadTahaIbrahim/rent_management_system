<?php
include("admin/config.php"); // Ensure this file connects to your database

session_start();

// Ensure user is logged in
if (!isset($_SESSION['logname']) || !isset($_SESSION['loguemail'])) {
    echo "<script>alert('You must be logged in to access the checkout page.'); window.location.href = 'login.php';</script>";
    exit();
}

// Retrieve data from POST and sanitize
$fullName = mysqli_real_escape_string($conn, htmlspecialchars($_POST['full_name']));
$city = mysqli_real_escape_string($conn, htmlspecialchars($_POST['city']));
$address = mysqli_real_escape_string($conn, htmlspecialchars($_POST['address']));
$postcode = mysqli_real_escape_string($conn, htmlspecialchars($_POST['postcode']));
$phone = mysqli_real_escape_string($conn, htmlspecialchars($_POST['phone']));
$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email_address']));
$orderNotes = mysqli_real_escape_string($conn, htmlspecialchars($_POST['order_notes']));
$paymentMethod = mysqli_real_escape_string($conn, htmlspecialchars($_POST['payment_method']));
$deliveryDate = isset($_SESSION['delivery_date']) ? mysqli_real_escape_string($conn, $_SESSION['delivery_date']) : '';
$returnDate = isset($_SESSION['return_date']) ? mysqli_real_escape_string($conn, $_SESSION['return_date']) : '';

// Start transaction
mysqli_begin_transaction($conn);

try {
    // Insert into checkout table
    $insertCheckout = "INSERT INTO checkout (c_name, c_city, c_address, c_postcode, c_phone, c_email, c_ordernotes, c_payment) 
                        VALUES ('$fullName', '$city', '$address', '$postcode', '$phone', '$email', '$orderNotes', '$paymentMethod')";

    if (!mysqli_query($conn, $insertCheckout)) {
        throw new Exception(mysqli_error($conn));
    }

    $checkoutId = mysqli_insert_id($conn); // Get the last inserted ID

    // Insert into orders table
    if (!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $item) {
            $productName = mysqli_real_escape_string($conn, htmlspecialchars($item['Name']));
            $quantity = (int)$item['Qty'];
            $price = (float)$item['Price'];
            $subtotal = $quantity * $price;

            $insertOrder = "INSERT INTO orders (order_pro, order_quantity, order_price, order_delivery, order_return, order_cuser, order_status, cid_fk) 
                            VALUES ('$productName', $quantity, $price, '$deliveryDate', '$returnDate', '$fullName', 'Pending', $checkoutId)";

            if (!mysqli_query($conn, $insertOrder)) {
                throw new Exception(mysqli_error($conn));
            }
        }
    } else {
        throw new Exception("Cart is empty.");
    }

    // Commit transaction
    mysqli_commit($conn);

    // Clear cart and session data
    unset($_SESSION["cart"]);
    unset($_SESSION['delivery_date']);
    unset($_SESSION['return_date']);

    // Redirect to order confirmation page
    header("Location: purchase.php?checkout_id=$checkoutId");
    exit();
} catch (Exception $e) {
    // Rollback transaction on error
    mysqli_rollback($conn);
    echo "Error: " . $e->getMessage();
    exit();
}

mysqli_close($conn);
?>
