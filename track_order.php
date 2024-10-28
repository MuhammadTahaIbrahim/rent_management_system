<?php
include("uheader.php"); 
include("admin/config.php");

if (!isset($_SESSION['logname'])) {
    die('Session variable "logname" is not set.');
}

$logged_in_user = $_SESSION['logname'];
$order_details = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cid_fk = $_POST['cid_fk'] ?? '';

    // Check if CID FK is provided
    if (!empty($cid_fk)) {
        // Fetch all orders associated with the provided CID FK and logged-in user
        $query = "SELECT o.order_id, o.order_pro, o.order_quantity, o.order_price, o.order_delivery, o.order_return, o.order_cuser, o.order_status 
                  FROM orders o
                  WHERE o.cid_fk = ? AND o.order_cuser = ?";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("ss", $cid_fk, $logged_in_user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $order_details = "<h3>Order Details</h3>
                              <table class='table table-striped'>
                                  <thead>
                                      <tr>
                                          <th>Order No</th>
                                          <th>Product</th>
                                          <th>Quantity</th>
                                          <th>Price</th>
                                          <th>Delivery</th>
                                          <th>Return</th>
                                          <th>Name</th>
                                          <th>Status</th>
                                      </tr>
                                  </thead>
                                  <tbody>";

            while ($order = $result->fetch_assoc()) {
                $order_details .= "
                    <tr><td>ODN{$order['order_id']}</td>
                        <td>{$order['order_pro']}</td>
                        <td>{$order['order_quantity']}</td>
                        <td>{$order['order_price']}</td>
                        <td>{$order['order_delivery']}</td>
                        <td>{$order['order_return']}</td>
                        <td>{$order['order_cuser']}</td>
                        <td>{$order['order_status']}</td>
                    </tr>";
            }

            $order_details .= "</tbody></table>";
        } else {
            $order_details = "<p class='text-danger'>No orders found for the provided ID and Name.</p>";
        }

        $stmt->close();
    } else {
        $order_details = "<p class='text-danger'>Please provide a Order id.</p>";
    }
}

$conn->close();
?>

<div class="breadcrumb-area breadcrumb-padding-6">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Track Your Order</h2>
            </div>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li>></li>
                <li>Track Your Order</li>
            </ul>
        </div>
    </div>
</div>
<!-- my account wrapper start -->
<div class="my-account-wrapper pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Track Order Start -->
                <div class="track-order-wrapper">
                    <h3 class="text-center mb-4">Track Your Order</h3>
                    <form action="track_order.php" method="post" class="form-track-order">
                        <div class="form-group mb-3">
                            <label for="order_cuser" class="form-label">Name</label>
                            <input type="text" name="order_cuser" id="order_cuser" class="form-control" value="<?php echo htmlspecialchars($logged_in_user); ?>" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="cid_fk" class="form-label">ID</label>
                            <input type="text" name="cid_fk" id="cid_fk" class="form-control" placeholder="DFY" required>
                        </div>
                        <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg" style="background-color: #BB9B1F; border-color: #BB9B1F; color: white; padding: 5px 10px; font-size: 20px; border-radius: 5px;">Track Order</button>
                        </div>
                    </form>
                    <!-- Display order details -->
                    <div class="order-details mt-4">
                        <?php echo $order_details; ?>
                    </div>
                </div>
                <!-- Track Order End -->
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->
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
    .track-order-wrapper {
        background: #f7f7f7;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif; /* Default font */
    }
    .form-track-order {
        max-width: 600px;
        margin: 0 auto;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-label {
        font-weight: bold;
        font-size: 16px; /* Normal font size */
    }
    .form-control {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        font-size: 14px; /* Normal font size */
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 14px; /* Normal font size */
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
        font-size: 14px; /* Normal font size */
    }
    .table th, .table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }
    .table th {
        background-color: #f4f4f4;
        font-weight: bold;
    }
    .text-danger {
        color: #dc3545;
    }
</style>
</body>
</html>
