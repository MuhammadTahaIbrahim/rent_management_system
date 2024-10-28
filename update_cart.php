<?php
session_start();

if(isset($_POST['update_cart'])) {
    $newQuantities = $_POST['quantity'];


    foreach($newQuantities as $key => $qty) {
        // Ensure quantity is a positive integer
        $newQty = intval($qty);
        if($newQty > 0) {
            $_SESSION["cart"][$key]["Qty"] = $newQty; 
        } else {

            unset($_SESSION["cart"][$key]);
        }
    }

    header("Location: cart.php");
    exit;
} else {
   
    header("Location: cart.php");
    exit;
}
?>
