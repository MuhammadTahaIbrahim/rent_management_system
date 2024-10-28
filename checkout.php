<?php
// Starting output buffering
ob_start(); 

// Include necessary files
include("uheader.php");
include("admin/config.php"); 

// Redirect if the user is not logged in
if (!isset($_SESSION['logname']) || !isset($_SESSION['loguemail'])) {
    $error_message = "You must be logged in to access the checkout page.";
    echo "<script>alert('$error_message'); window.location.href = 'login.php';</script>";
    exit();
}

$shippingFee = 10000;

function getDefaultDates() {
    $today = new DateTime();
    $deliveryDate = $today->add(new DateInterval('P2D'))->format('Y-m-d');
    $returnDate = (new DateTime($deliveryDate))->add(new DateInterval('P7D'))->format('Y-m-d');
    return [$deliveryDate, $returnDate];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deliveryDate = isset($_POST['delivery_date']) ? htmlspecialchars($_POST['delivery_date']) : '';
    $returnDate = isset($_POST['return_date']) ? htmlspecialchars($_POST['return_date']) : '';

    if (empty($deliveryDate) || empty($returnDate)) {
        list($deliveryDate, $returnDate) = getDefaultDates();
    }

    // Save dates in session
    $_SESSION['delivery_date'] = $deliveryDate;
    $_SESSION['return_date'] = $returnDate;
} else {
    if (!isset($_SESSION['delivery_date']) || !isset($_SESSION['return_date'])) {
        list($deliveryDate, $returnDate) = getDefaultDates();
        $_SESSION['delivery_date'] = $deliveryDate;
        $_SESSION['return_date'] = $returnDate;
    } else {
        $deliveryDate = $_SESSION['delivery_date'];
        $returnDate = $_SESSION['return_date'];
    }
}

// Fetch cities from database
$cities = array();
$query = "SELECT * FROM city";
$result = mysqli_query($conn, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cities[] = $row['cname'];
    }
} else {
    echo "Error fetching cities: " . mysqli_error($conn);
}
?>

<!-- HTML Structure for Checkout Page -->
<div class="breadcrumb-area breadcrumb-padding-6">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Checkout Page</h2>
            </div>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li>></li>
                <li>CHECKOUT</li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-main-area pb-130">
    <div class="container">
        <div class="checkout-wrap pt-30">
            <form action="process_checkout.php" method="POST">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap mr-50">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="billing-info mb-20">
                                        <label>Full Name <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?php echo htmlspecialchars($_SESSION['logname']); ?>" name="full_name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-20">
                                        <label>City <abbr class="required" title="required">*</abbr></label>
                                        <select name="city" required>
                                            <option value="">Select a city</option>
                                            <?php
                // Array of cities in Pakistan
                $cities_in_pakistan = array(
                    'Karachi', 'Lahore', 'Islamabad', 'Rawalpindi', 'Faisalabad', 'Multan', 'Gujranwala', 'Quetta', 'Peshawar', 'Hyderabad', 'Sialkot', 'Bahawalpur', 'Sargodha', 'Sahiwal', 'Sukkur', 'Larkana', 'Sheikhupura', 'Jhang', 'Rahim Yar Khan', 'Gujrat', 'Kasur', 'Mardan', 'Mingora', 'Dera Ghazi Khan', 'Nawabshah', 'Okara', 'Mirpur Khas', 'Chiniot', 'Kamoke', 'Sadiqabad', 'Burewala'
                    // Add more cities as needed
                );

                // Loop through the cities array to create options
                foreach ($cities_in_pakistan as $city) {
                    echo '<option value="' . htmlspecialchars($city) . '">' . htmlspecialchars($city) . '</option>';
                }
                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20">
                                        <label>Enter Your Address <abbr class="required" title="required">*</abbr></label>
                                        <input class="billing-address" placeholder="House number and street name" type="text" name="address" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                        <div class="billing-info mb-20">
                            <label>Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="postcode" pattern="\d+" title="Please enter a valid postcode" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="billing-info mb-20">
                            <label>Phone <abbr class="required" title="required">*</abbr></label>
                            <input type="text" name="phone" pattern="\d+" title="Please enter a valid phone number" required>
                        </div>
                    </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="billing-info mb-20">
                                        <label>Email Address <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?php echo htmlspecialchars($_SESSION['loguemail']); ?>" name="email_address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="additional-info-wrap">
                                <label>Order notes</label>
                                <textarea placeholder="Notes about your order, e.g. special notes for delivery." name="order_notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-info-wrap">
                                <div class="your-order-info">
                                        <ul>
                                            <li>Product <span>Total</span></li>
                                            <?php
                                            $total = 0;
                                            $totalDepositFee = 0;
                                            if (!empty($_SESSION["cart"])) {
                                                foreach ($_SESSION["cart"] as $item) {
                                                    $product_name = htmlspecialchars($item['Name']);
                                                    $quantity = 1;  // Quantity is fixed at 1
                                                    $price = (float)$item['Price'];
                                                    $subtotal = $quantity * $price;
                                                    $total += $subtotal;

                                                    // Calculate deposit fee
                                                    if ($price <= 10000) {
                                                        $depositFee = 5000;
                                                    } else {
                                                        $depositFee = 10000;
                                                    }
                                                    $totalDepositFee += $depositFee;

                                                    echo "<li>$product_name x $quantity <span>Rs " . number_format($subtotal, 2) . "</span></li>";
                                                }
                                            } else {
                                                echo "<li>Your cart is empty.</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-shipping">
                                        <ul>
                                            <li><strong>Delivery Date:</strong> <?php echo htmlspecialchars($deliveryDate); ?></li>
                                            <li><strong>Return Date:</strong> <?php echo htmlspecialchars($returnDate); ?></li>
                                            <li><strong>Security Deposit Fee:</strong> <span>Rs.<?php echo number_format($totalDepositFee, 2); ?></span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-subtotal">
                                        <ul>
                                            <li>Subtotal <span>Rs <?php echo number_format($total, 2); ?></span></li>
                                        </ul>
                                    </div>
                                    <div class="your-order-info order-total">
                                        <ul>
                                            <?php
                                            $totalWithShipping = $total + $totalDepositFee;
                                            ?>
                                            <li>Total <span>Rs <?php echo number_format($totalWithShipping, 2); ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="payment-method">
    <div class="pay-top sin-payment">
        <input id="payment-method-3" class="input-radio" type="radio" value="cash on delivery" name="payment_method" checked>
        <label for="payment-method-3">Cash on delivery </label>
        <div class="payment-box payment_method_bacs">
            <p>Pay with cash upon delivery.</p>
        </div>
    </div>
</div>

                            </div>
                            <div class="Place-order">
                                <button type="submit" class="btn btn-primary">Place Order</button>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include("ufooter.php");
?>

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
