<?php
include("header.php");
?>
   <style>
        /* Base styles */
        .delivery-container {
            padding: 20px;
            /* background: #D2B843; */
            font-family: 'Times New Roman', serif;
            opacity: 0;
            transition: opacity 0.6s ease, transform 0.6s ease;
            transform: translateY(20px);
        }

        .delivery-container.aos-animate {
            opacity: 1;
            transform: translateY(0);
        }

        .delivery-container label {
            font-size: 16px;
        }

        .delivery-container .form-control {
            width: 100%;
            max-width: 300px;
            height: 45px;
            color: black;
        }

        .delivery-container .datepic {
            box-sizing: border-box;
        }

        .delivery-container .info-text {
            margin-top: 10px;
            color: black;
        }

        .delivery-container .info-text span {
            font-weight: bold;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .delivery-container {
                padding: 15px;
            }

            .delivery-container label {
                font-size: 14px;
            }

            .delivery-container .form-control {
                height: 40px;
            }

            .delivery-container .info-text {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .delivery-container {
                padding: 10px;
            }

            .delivery-container label {
                font-size: 12px;
            }

            .delivery-container .form-control {
                height: 35px;
            }

            .delivery-container .info-text {
                font-size: 12px;
            }
        }
    </style>
<?php
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $q = "SELECT * FROM productdata where pro_id='" . $pid . "'";
    $result = mysqli_query($conn, $q);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        ?>

        <div class="breadcrumb-area breadcrumb-padding-7">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <div class="breadcrumb-title breadcrumb-title-responsive">
                        <h2 data-aos="fade-up" data-aos-delay="200"><?php echo $row['pro_desc']; ?></h2>
                    </div>
                    <ul data-aos="fade-up" data-aos-delay="300">
                        <li><a href="index.php">HOME</a></li>
                        <li>></li>
                        <li><a href="shop.php">SHOP</a></li>
                        <li>></li>
                        <li>SINGLE PRODUCT</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="product-details-area section-padding-lr-2 pb-115">
            <div class="container-fluid">
            <?php
$scid = isset($_GET['scid']) ? $_GET['scid'] : '';

if (!empty($scid)) {
    $backUrl = "shop.php?scid=" . $scid;
} else {
    $backUrl = "index.php";
}
?>
<div class="back-to-shop mb-4" data-aos="fade-up" data-aos-delay="200">
    <a href="<?php echo $backUrl; ?>"><img class="injectable" src="assets/images/icon-img/arrow-left-6.svg" alt=""> Back to Shop</a>
</div>
                <div class="row">
                    <div class="col-lg-7">
                        <div class="product-details-tab" data-aos="fade-up" data-aos-delay="300">
                            <div class="pro-dec-big-img-slider">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="<?php echo "admin/images/" . $row['pro_img']; ?>">
                                            <img src="<?php echo "admin/images/" . $row['pro_img']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-dec-slider-small product-dec-small-style1">
                                <div class="product-dec-small active">
                                    <img src="<?php echo "admin/images/" . $row['pro_img']; ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="product-details-content product-details-mrg-left">
                            <div class="product-rating-stock-review" data-aos="fade-up" data-aos-delay="200">
                                <!-- Product rating and review display -->
                            </div>
                            <h2 data-aos="fade-up" data-aos-delay="300"><?php echo $row['pro_name']; ?></h2>
                            <div class="product-details-price" data-aos="fade-up" data-aos-delay="400">
                                <span>Rs <?php echo $row['pro_price']; ?></span>
                            </div>
                            <p data-aos="fade-up" data-aos-delay="500"><?php echo $row['pro_desc']; ?></p>
                            <p data-aos="fade-up" data-aos-delay="500">Size : <?php echo $row['pro_size']; ?></p>
                            <!-- <div class="product-details-color" data-aos="fade-up" data-aos-delay="600">
                                <span>Select Color</span>
                                <ul>
                                    <li><a title="White" class="white" href="#">white</a></li>
                                    <li><a title="Pink" class="pink" href="#">pink</a></li>
                                    <li><a title="Yellow" class="yellow" href="#">yellow</a></li>
                                    <li><a title="Black" class="black" href="#">black</a></li>
                                    <li><a title="Blue" class="blue" href="#">blue</a></li>
                                </ul>
                            </div> -->
                            <div class="product-details-quality-cart" data-aos="fade-up" data-aos-delay="200">
                            <form action="cart.php" method="post">
                                    <input type="hidden" name="hide_id" value="<?php echo $row['pro_id']; ?>">
                                    <input type="hidden" name="hide_name" value="<?php echo $row['pro_name']; ?>">
                                    <input type="hidden" name="hide_price" value="<?php echo $row['pro_price']; ?>">
                                    <input type="hidden" name="hide_img" value="<?php echo $row['pro_img']; ?>">
                                    <!-- <div class="product-quality">
                                        <input class="cart-plus-minus-box input-text qty text" name="quantity" value="1">
                                    </div> -->
                                    <div class="product-details-cart my-5">
                                        <button type="submit" class="cbutton btn btn-outline-dark" name="btncart">Add to Cart</button>
                                    </div>
                                </form>
                            </div>
                            <!-- ------------------------------------------- -->
                            <div class="delivery-container mb-5" data-aos="fade-up" data-aos-delay="200">
                                <label for="datepicker">Select Delivery Date</label>
                                <input type="date" class="form-control datepic dt hasDatepicker" id="datepicker" required name="dt" autocomplete="off">
                                <input type="hidden" name="delivery_date" id="delivery_date" class="delivery_date">
                                <input type="hidden" name="pickup_date" id="pickup_date" class="pickup_date">
                                <div class="info-text">
                                    Delivery Date: <span id="delivery_dt_text"></span><br>
                                    Return Date: <span id="pickup_dt_text"></span>
                                </div>
                                <input type="hidden" value="<?php echo $row['pro_id']; ?>" class="form-control dress_id" name="dress_id">
                            </div>
                            <!-- AOS library -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
                            <script>
                                // Initialize AOS
                                AOS.init({
                                    duration: 600, // Duration of the animation
                                    easing: 'ease-in-out', // Easing function for the animation
                                    delay: 200, // Delay before the animation starts
                                });
                            </script>
                            <!-- Datepicker functionality -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Get today's date in yyyy-mm-dd format
                                    var today = new Date().toISOString().split('T')[0];

                                    // Set min attribute of datepicker to today
                                    document.getElementById('datepicker').min = today;
                                });
                            </script>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var datepicker = document.getElementById('datepicker');
                                    var deliveryDtText = document.getElementById('delivery_dt_text');
                                    var pickupDtText = document.getElementById('pickup_dt_text');
                                    var deliveryDateInput = document.getElementById('delivery_date');
                                    var pickupDateInput = document.getElementById('pickup_date');

                                    datepicker.addEventListener('change', function() {
                                        var selectedDate = new Date(datepicker.value);

                                        // Set delivery date
                                        var deliveryDate = formatDate(selectedDate);
                                        deliveryDtText.textContent = deliveryDate;
                                        deliveryDateInput.value = deliveryDate;

                                        // Set return date (7 days after delivery)
                                        var returnDate = new Date(selectedDate);
                                        returnDate.setDate(returnDate.getDate() + 7);
                                        var formattedReturnDate = formatDate(returnDate);
                                        pickupDtText.textContent = formattedReturnDate;
                                        pickupDateInput.value = formattedReturnDate;
                                    });

                                    // Function to format date as DD-Mon-YYYY (e.g., 18-Jul-2024)
                                    function formatDate(date) {
                                        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                        var day = date.getDate();
                                        var monthIndex = date.getMonth();
                                        var year = date.getFullYear();
                                        return day + '-' + months[monthIndex] + '-' + year;
                                    }
                                });
                            </script>
                            <div >
                                                                <!-- -->
                                                                <div class="product-details-wishlist-compare" data-aos="fade-up" data-aos-delay="300">
                                                                <div class="product-details-wishlist">
    <a href="#" onclick="addToWishlist(<?php echo htmlspecialchars($row['pro_id']); ?>); return false;">
        <img class="injectable" src="assets/images/icon-img/heart-2.svg" alt="">
        Add to wishlist
    </a>
</div>
                            </div>

<script>
function addToWishlist(productId) {
    // Create a form element
    var form = document.createElement('form');
    form.method = 'post';
    form.action = 'wishlist.php';

    // Create a hidden input for the product ID
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'product_id';
    input.value = productId;
    form.appendChild(input);

    // Append the form to the body and submit it
    document.body.appendChild(form);
    form.submit();
}
</script>
                            <div class="product-details-meta-wrap" data-aos="fade-up" data-aos-delay="400">
                                <div class="product-details-meta">
                                    <span>Categories: </span>
                                    <ul>
                                        <li><a href="#"><?php echo $row['subname']; ?></a></li>
                                    </ul>
                                </div>
                                <div class="product-details-meta">
                                    <span>Product ID: </span>
                                    <ul>
                             <li>PRO<?php echo $row['pro_id']; ?></li>
</ul>
                                </div>
                            </div>
                            <div class="product-details-social" data-aos="fade-up" data-aos-delay="500">
    <a class="facebook" href="https://www.facebook.com" target="_blank">
        <img class="injectable" src="assets/images/icon-img/facebook.svg" alt="Facebook">
    </a>
    <a class="twitter" href="https://twitter.com" target="_blank">
        <img class="injectable" src="assets/images/icon-img/twitter.svg" alt="Twitter">
    </a>
    <a class="pinterest" href="https://www.pinterest.com" target="_blank">
        <img class="injectable" src="assets/images/icon-img/pinterest.svg" alt="Pinterest">
    </a>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                }
            }

            ?>
            </div>
<div class="related-product section-padding-lr-1 pb-100">
    <div class="container-fluid">
        <div class="section-title-4 mb-100 text-center">
            <h2>Related Products</h2>
        </div>
        <div class="related-product-active">
    <?php
    $query = "SELECT * FROM productdata ORDER BY pro_price ASC LIMIT 4";
    $result = mysqli_query($conn, $query);

    $count = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="product-plr-1" data-aos="fade-up" data-aos-delay="200">
            <div class="product-wrap">
                <div class="product-img img-zoom mb-4">
                    <a href="product-details.php?pid=<?php echo $row['pro_id']; ?>">
                        <img class="default-img" style="width: 100%; height: 500px; object-fit: cover;" src="admin/images/<?php echo $row['pro_img']; ?>" alt="<?php echo $row['pro_name']; ?>">
                    </a>
                </div>
                <div class="product-content text-center">
                    <h3><a href="product-details.php?pid=<?php echo $row['pro_id']; ?>"><?php echo $row['pro_name']; ?></a></h3>
                    <div class="product-price">
                        <span>Rs.<?php echo $row['pro_price']; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $count++;
        if ($count >= 4) {
            break;
        }
    }
    if ($count == 0) {
        echo '<p class="text-center">No related products found.</p>';
    }
    ?>
</div>

    </div>
</div>


        <?php
include("footer.php");
?>
    </div>
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