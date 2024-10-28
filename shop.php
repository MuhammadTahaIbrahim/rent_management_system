<?php
include("header.php");
?>

<div class="breadcrumb-area breadcrumb-padding">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <div class="breadcrumb-title" data-aos="fade-up" data-aos-delay="200">
                        <h2>Shop With Us</h2>
                    </div>
                    <ul data-aos="fade-up" data-aos-delay="300">
                        <li>
                            <a href="index.php">HOME</a>
                        </li>
                        <li>
                            >
                        </li>
                        <li><a href="shop.php">SHOP</a> </li>
                        <li>
                            >
                        </li>
                        <li>SHOP WITH US</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shop-area section-padding-lr-4 pb-235">
            <div class="container-fluid">
                <div class="row flex-row-reverse">
                    <div class="col-lg-12 col-nd-12">
                        <div class="shop-page-wrap">
                            <div class="padding-54-row-col">
                            <div class="row">
    <?php
    if (isset($_GET['scid'])) {
        $subid = $_GET['scid'];
        $query = "SELECT * FROM productdata WHERE subid = '$subid'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-75">
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            <div class="product-img img-zoom mb-4">
                            <a href="product-details.php?pid=<?php echo $row['pro_id']; ?>&scid=<?php echo $subid; ?>">
                            <img class="default-img" src="<?php echo "admin/images/" . $row['pro_img']; ?>" alt="" style="width: 100%; height: 600px; object-fit: cover;">
                            </a>
                                <div class="product-action-wrap">
                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['pro_id']; ?>">
                                        <img class="injectable" src="assets/images/icon-img/eye.svg" alt="">
                                    </button>
                                    <form action="wishlist.php" method="post" style="display:inline;">
    <input type="hidden" name="product_id" value="<?php echo $row['pro_id']; ?>">
    <button type="submit" title="Wishlist">
        <img class="injectable" src="assets/images/icon-img/heart.svg" alt="">
    </button>
</form>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <h3><a href="product-details.php?pid=<?php echo $row['pro_id']; ?>"><?php echo $row['pro_name']; ?></a></h3>
                                <div class="product-price">
                                    <span>Rs.<?php echo $row['pro_price']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Section -->
                    <div class="modal fade" id="exampleModal<?php echo $row['pro_id']; ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row no-gutters">
                                        <div class="col-lg-5 col-md-12 col-12">
                                            <div class="quickview-img">
                                                <a href="product-details.php?pid=<?php echo $row['pro_id']; ?>">
                                                    <img src="admin/images/<?php echo $row['pro_img']; ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-12 col-12">
                                            <div class="product-details-content quickview-content">
                                                <h2><?php echo $row['pro_name']; ?></h2>
                                                <div class="product-details-price">
                                                    <span><?php echo $row['pro_price']; ?></span>
                                                </div>
                                                <p><?php echo $row['pro_desc']; ?></p>
                                                <div class="product-details-quality-cart">
                                                    <div class="product-details-cart">
                                                        <form action="cart.php" method="post">
                                                            <input type="hidden" name="hide_id" value="<?php echo $row['pro_id']; ?>">
                                                            <input type="hidden" name="hide_name" value="<?php echo $row['pro_name']; ?>">
                                                            <input type="hidden" name="hide_price" value="<?php echo $row['pro_price']; ?>">
                                                            <input type="hidden" name="hide_img" value="<?php echo $row['pro_img']; ?>">
                                                            <div class="total my-3">
                                                                <button class="btn btn-outline-dark" name="btncart">Add To Cart</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="product-details-wishlist-compare">
                                                    <div class="product-details-wishlist">
                                                        <a href="#">
                                                            <img class="injectable" src="assets/images/icon-img/heart-2.svg" alt="">
                                                            Add to wishlist
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-details-meta-wrap">
                                                    <div class="product-details-meta">
                                                        <span>Size:</span>
                                                        <ul>
                                                            <li><?php echo $row['pro_size']; ?></li>
                                                        </ul>
                                                    </div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal end -->
                <?php
                }
            } else {
                ?>
                <div class="col-12 text-center">
                    <button onclick="showAlert()" class="btn btn-outline-danger mt-3">No products found</button>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-12 text-center">
                <button onclick="showAlert()" class="btn btn-outline-danger mt-3">Error: <?php echo mysqli_error($conn); ?></button>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="col-12 text-center">
            <button onclick="showAlert()" class="btn btn-outline-danger mt-3">Please select a subcategory</button>
        </div>
        <?php
    }
    ?>

    <script>
        function showAlert() {
            alert("Please select a valid subcategory to display products.");
        }
    </script>
</div>



                            </div>
                            <!-- <div class="pagination-style text-center mt-30" data-aos="fade-up" data-aos-delay="200">
                                <ul>
                                    <li><a class="active" href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">04</a></li>
                                    <li><a href="#">05</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
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