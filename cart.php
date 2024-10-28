<?php
include("header.php");

if(isset($_POST['btncart'])) {
    if(!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $id = $_POST["hide_id"];
    $name = $_POST["hide_name"];
    $price = floatval($_POST["hide_price"]);
    $img = $_POST["hide_img"];
    $qty = 1; // Always set quantity to 1

    $isExist = false;

    foreach($_SESSION["cart"] as $key => $item) {
        if($item["ID"] == $id) {
            $isExist = true;
            break;
        }
    }

    if(!$isExist) {
        array_push($_SESSION["cart"], array("ID" => $id, "Name" => $name, "Price" => $price, "Img" => $img, "Qty" => $qty));
    }
}

// Delivery and return fee
$deliveryAndReturnFee = 0;

// Calculate subtotal
$subtotal = 0;
if(!empty($_SESSION["cart"])) {
    foreach($_SESSION["cart"] as $item) {
        $subtotal += $item["Price"];
    }
}

// Total including delivery/return fee
$totalAmount = $subtotal + $deliveryAndReturnFee;

?>

<div class="breadcrumb-area breadcrumb-padding-6">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Cart Page</h2>
            </div>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li>></li>
                <li>CART</li>
            </ul>
        </div>
    </div>
</div>

<div class="cart-area pb-130">
    <?php if(!empty($_SESSION["cart"])): ?>
        <div class="container">
            <div class="row pb-120">
                <div class="col-12">
                    <form action="update_cart.php" method="post">
                        <div class="cart-table-content">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="width-thumbnail">Thumbnail</th>
                                            <th class="width-name">Product</th>
                                            <th class="width-price">Price</th>
                                            <th class="width-quantity">Quantity</th>
                                            <th class="width-subtotal">Subtotal</th>
                                            <th class="width-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody>
    <?php foreach($_SESSION["cart"] as $key => $item): ?>
        <tr>
            <td class="product-thumbnail">
                <a href="product-details.php"><img src="admin/images/<?php echo htmlspecialchars($item["Img"]); ?>" alt=""></a>
            </td>
            <td class="product-name">
                <h5><a href="product-details.php"><?php echo htmlspecialchars($item["Name"]); ?></a></h5>
            </td>
            <td class="product-price"><span class="amount">Rs.<?php echo number_format($item["Price"], 2); ?></span></td>
            <td class="cart-quality">
                <div class="product-quality">
                    <span>1</span> <!-- Fixed quantity display -->
                </div>
            </td>
            <td class="product-total"><span>Rs.<?php echo number_format($item["Price"], 2); ?></span></td>
            <td class="product-remove"><a href="remove.php?rid=<?php echo $key; ?>"><i class="las la-trash"></i></a></td>
        </tr>
    <?php endforeach; ?>
</tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="index.php">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <!-- <button type="submit" name="update_cart">Update Cart</button> -->
                                        <a href="clear.php">Clear Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <!-- Placeholder for shipping calculation inputs -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-calculate-discount-wrap mb-40">
                        <!-- Placeholder for coupon code input -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="grand-total-wrap">
                        <div class="grand-total-content">
                            <h3>Subtotal <span>Rs.<?php echo number_format($subtotal, 2); ?></span></h3>
                            <div class="grand-shipping">
                            
                            </div>
                            <div class="grand-total">
                                <h4>Total <span>Rs.<?php echo number_format($totalAmount, 2); ?></span></h4>
                            </div>
                        </div>
                        <div class="grand-total-btn">
                            <a class="btn btn-link" href="login-register.php?checkout=true">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Your Cart is Empty</h1>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include("footer.php"); ?>

<!-- Global Vendor, plugins JS -->
<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/plugins/svg-inject.min.js"></script>
<script src="assets/js/plugins/slick.js"></script>
<script src="assets/js/plugins/wow.js"></script>
<script src="assets/js/plugins/slinky.min.js"></script>
<script src="assets/js/plugins/jquery-ui.js"></script>
<script src="assets/js/plugins/jquery-ui-touch-punch.js"></script>
<script src="assets/js/plugins/countdown.js"></script>
<script src="assets/js/plugins/magnific-popup.js"></script>
<script src="assets/js/plugins/easyzoom.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/aos.js"></script>
<script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/plugins/jquery.nice-select.min.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>

</body>
</html>
