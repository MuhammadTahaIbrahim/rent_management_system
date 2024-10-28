<?php
include("uheader.php");
include("config.php"); // Database connection

// Debugging: Check if product_id is posted
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Add product to wishlist
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }

    if (!in_array($product_id, $_SESSION['wishlist'])) {
        $_SESSION['wishlist'][] = $product_id;
    }

} else {
    // echo "No Product ID received.";
}

// Fetch wishlist items from session
$wishlist = isset($_SESSION['wishlist']) ? $_SESSION['wishlist'] : array();

// Fetch product details from the database
$wishlistItems = [];
if (!empty($wishlist)) {
    $placeholders = implode(',', array_fill(0, count($wishlist), '?'));
    $query = "SELECT pro_id, pro_name, pro_price, pro_img FROM product WHERE pro_id IN ($placeholders)";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param(str_repeat('i', count($wishlist)), ...$wishlist);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result) {
            $wishlistItems = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Error fetching wishlist items: " . $conn->error;
        }
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "<script>
    alert('Your Wishlist is Empty');
</script>";
}
?>

<div class="breadcrumb-area breadcrumb-padding-6">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Wishlist</h2>
            </div>
            <ul>
                <li><a href="uindex.php">HOME</a></li>
                <li>></li>
                <li>WISHLIST</li>
            </ul>
        </div>
    </div>
</div>

<div class="wishlist-area bg-white pb-130">
    <div class="container">
        <?php if (!empty($wishlistItems)): ?>
            <div class="row">
                <div class="col-12">
                    <div class="wishlist-table-content">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="width-thumbnail">Thumbnail</th>
                                        <th class="width-name">Product</th>
                                        <th class="width-price">Price</th>
                                        <th class="width-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($wishlistItems as $item): ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="uproduct-details.php?pid=<?php echo $item['pro_id']; ?>">
                                                <img src="admin/images/<?php echo htmlspecialchars($item['pro_img']); ?>" alt="">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <h5><a href="product-details.php?pid=<?php echo $item['pro_id']; ?>"><?php echo htmlspecialchars($item['pro_name']); ?></a></h5>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">Rs.<?php echo number_format(floatval($item['pro_price']), 2); ?></span>
                                        </td>
                                        <td class="product-remove">
    <a href="uremove_wishlist.php?product_id=<?php echo $item['pro_id']; ?>"><i class="las la-trash"></i></a>
</td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Your Wishlist is Empty</h1>
            </div>
        </div>
    <?php endif; ?>
    </div>
</div>

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

</body>
</html>
