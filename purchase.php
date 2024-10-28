<?php
include("uheader.php");
include("admin/config.php");

// Ensure user is logged in
if (!isset($_SESSION['logname']) || !isset($_SESSION['loguemail'])) {
    echo "<script>alert('You must be logged in to access the checkout page.'); window.location.href = 'login.php';</script>";
    exit();
}

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$checkoutId = isset($_GET['checkout_id']) ? htmlspecialchars($_GET['checkout_id']) : '';

if ($checkoutId) {
    // Fetch checkout details
    $orderQuery = "SELECT * FROM checkout WHERE c_id = ?";
    $stmt = $conn->prepare($orderQuery);
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);
    }
    $stmt->bind_param("i", $checkoutId);
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }
    $checkout = $stmt->get_result()->fetch_assoc();

    if ($checkout) {
        $fullName = htmlspecialchars($checkout['c_name']);
        $email = htmlspecialchars($checkout['c_email']);

        // Fetch order items related to this checkout ID
        $orderItemsQuery = "SELECT * FROM orders WHERE cid_fk = ? AND order_status = 'Pending'";
        $stmt = $conn->prepare($orderItemsQuery);
        if (!$stmt) {
            die("Failed to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("i", $checkoutId);
        if (!$stmt->execute()) {
            die("Error executing query: " . $stmt->error);
        }
        $orderItems = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $subtotal = 0;
        $totalDepositFee = 0;

        foreach ($orderItems as $item) {
            $price = (float)$item['order_price'];
            $subtotal += $price;

            // Calculate deposit fee based on price
            if ($price <= 10000) {
                $depositFee = 5000;
            } else {
                $depositFee = 10000;
            }
            $totalDepositFee += $depositFee;
        }

        // Send email confirmation using PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Specify your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'quratulainb66@gmail.com';  // SMTP username
            $mail->Password = 'bifh sroi ercy jbrv';  // SMTP password
            $mail->SMTPSecure = 'tls';  // Enable TLS encryption, ssl also accepted
            $mail->Port = 587;  // TCP port to connect to

            // Recipients
            $mail->setFrom('quratulainb66@gmail.com', 'Dressify');
            $mail->addAddress($email, $fullName);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Order Confirmation - Order #DFY' . $checkoutId;
            $mail->Body    = "
            <html>
            <head>
            <title>Order Confirmation</title>
            </head>
            <body>
            <p>Thank you for shopping with us, $fullName!</p>
            <p>Your order ID is: DFY$checkoutId. You can track your order on our website.</p>
            </body>
            </html>
            ";

            $mail->send();
        } catch (Exception $e) {
            // Log email sending failure
            error_log("Failed to send email. Mailer Error: {$mail->ErrorInfo}");
        }
    } else {
        echo "<p>Order not found. Invalid checkout ID.</p>";
        exit();
    }
} else {
    echo "<p>Invalid checkout ID. No ID provided in the URL.</p>";
    exit();
}
?>

<!-- HTML Content -->
<div class="breadcrumb-area breadcrumb-padding-6">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Order Confirmed</h2>
            </div>
            <ul>
                <li><a href="uindex.php">HOME</a></li>
                <li>&gt;</li>
                <li>Order Confirmed</li>
            </ul>
        </div>
    </div>
</div>

<!-- Cart Area -->
<div class="cart-area pb-130">
    <div class="container">
        <div class="row pb-120">
            <div class="col-md-6">
                <h1 class="order-title">Order Details</h1>
                <p class="order-id">Order #DFY<?php echo $checkoutId; ?></p>
                <p class="thank-you">Thank you, <?php echo $fullName; ?>!</p>
            </div>
            <div class="col-md-6">
                <!-- Optional: Map Integration -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="order-details">
                    <h2>Your Order Details</h2>
                    <p class="confirmation-msg">You will receive a confirmation email with your order number shortly.</p>
                    <div class="contact-info">
                        <strong>Contact Information:</strong> <?php echo $email; ?>
                    </div>
                    <div class="shipping-address">
                        <strong>Shipping Address:</strong>
                        <p><?php echo $fullName; ?><br><?php echo htmlspecialchars($checkout['c_address']); ?><br><?php echo htmlspecialchars($checkout['c_city']); ?> <?php echo htmlspecialchars($checkout['c_postcode']); ?><br>Pakistan<br><?php echo htmlspecialchars($checkout['c_phone']); ?></p>
                    </div>
                    <div class="billing-address">
                        <strong>Billing Address:</strong>
                        <p><?php echo $fullName; ?><br><?php echo htmlspecialchars($checkout['c_address']); ?><br><?php echo htmlspecialchars($checkout['c_city']); ?> <?php echo htmlspecialchars($checkout['c_postcode']); ?><br>Pakistan<br><?php echo htmlspecialchars($checkout['c_phone']); ?></p>
                    </div>
                    <div class="payment-method">
                        <strong>Payment Method:</strong> <?php echo htmlspecialchars($checkout['c_payment']); ?>
                    </div>
                    <div class="shipping-method">
                        <strong>Shipping Method:</strong> Standard
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order-details">
                    <h2>Order Items</h2>
                    <div class="order-items-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($orderItems)) {
                                    foreach ($orderItems as $item) {
                                        $productName = htmlspecialchars($item['order_pro']);
                                        $price = (float)$item['order_price'];
                                        echo "<tr>
                                                <td>$productName<br>Delivery Date: " . htmlspecialchars($item['order_delivery']) . "<br>Return Date: " . htmlspecialchars($item['order_return']) . "</td>
                                                <td>Rs " . number_format($price, 2) . "</td>
                                              </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='2'>No items found</td></tr>";
                                }
                                ?>
                                <!-- Display subtotal, deposit, and total -->
                                <tr>
                                    <td><strong>Subtotal</strong></td>
                                    <td>Rs <?php echo number_format($subtotal, 2); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Security Deposit:</strong></td>
                                    <td>Rs <?php echo number_format($totalDepositFee, 2); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td>Rs <?php echo number_format($subtotal + $totalDepositFee, 2); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <a href="uindex.php" class="btn btn-primary btn-md">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Footer -->
<?php include("ufooter.php"); ?>

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
<style>
    /* Adjustments for order details and order items */
    body {
        font-family: 'Arial', sans-serif; /* Change to your preferred font family */
    }

    .order-details {
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #e5e5e5;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .order-details h2 {
        font-size: 24px;
        color: #333333;
        margin-bottom: 15px;
    }

    .order-details p {
        font-size: 16px;
        color: #666666;
        margin-bottom: 15px;
    }

    .order-details .contact-info,
    .order-details .shipping-address,
    .order-details .billing-address,
    .order-details .payment-method,
    .order-details .delivery-details,
    .order-details .shipping-method {
        margin-bottom: 15px;
    }

    .order-details strong {
        font-weight: bold;
        margin-right: 10px;
    }

    .order-items-table table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .order-items-table th,
    .order-items-table td {
        border: 1px solid #e5e5e5;
        padding: 10px;
        text-align: left;
    }

    .order-items-table th {
        background-color: #f9f9f9;
        font-size: 16px;
        font-weight: bold;
        color: #333333;
    }

    .order-items-table td {
        font-size: 14px;
        color: #666666;
    }

    .order-items-table td strong {
        font-weight: bold;
    }
</style>

</body>
</html>
