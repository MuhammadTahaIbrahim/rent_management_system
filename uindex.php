<?php
include("uheader.php");
include("admin/config.php");
?>
    <style>
        /* .slider-area {
    position: relative;
    overflow: hidden;
    padding-top: 20px; 

.slider-active-1 {
    display: flex;
    width: 100%;
    height: auto;
}

.single-slider-wrap {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.single-slider-wrap img {
    width: 100%;
    height: auto;
    object-fit: cover; /* Maintain aspect ratio and cover the area 
} */

/* Responsive styles */
@media (max-width: 768px) {
    .single-slider-wrap {
        height: 300px; /* Set a height suitable for mobile devices */
    }
}

@media (max-width: 480px) {
    .single-slider-wrap {
        height: 200px; /* Further adjustment for smaller screens */
    }
}

/* Optional: Add spacing below the slider */
.slider-active-1 {
    margin-bottom: 20px; /* Adjust as needed */
}

        /* Base styles */
        .delivery-container {
            padding: 10px;
          
            font-family: 'Times New Roman', serif;
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
      <div class="slider-area">
            <div class="slider-active-1 nav-style-1 nav-style-1-modify">
                <div class="single-slider-wrap slider-height-1 d-flex align-items-center single-animation-wrap bg-img" style="background-image:url(assets/images/slider/home.jpg)">
                    <div class="slider-content slider-content-red slider-animated-1">
                        <h3 class="animated"></h3>
                        <h1 class="animated"> <br> </h1>
                    </div>
                </div>
                <div class="single-slider-wrap slider-height-1 d-flex align-items-center single-animation-wrap bg-img" style="background-image:url(assets/images/slider/home.jpg)">
                    <div class="slider-content slider-content-red slider-animated-1">
                        <h3 class="animated"></h3>
                        <h1 class="animated"><br> </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="features-area section-padding-2">
            <div class="container">
                <div class="features-all-wrap">
                    <div class="row mb-n6">
                        <div class="col-lg-4 col-md-4 mb-6">
                            <div class="features-wrap text-center" data-aos="fade-up" data-aos-delay="200">
                                <div class="features-img">
                                    <img class="injectable" src="assets/images/icon-img/cut.svg" alt="">
                                </div>
                                <h3>New Discount</h3>
                                <p>Suspendisse sit amet accumsan massa, et ullamcorper purus</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-6">
                            <div class="features-wrap text-center" data-aos="fade-up" data-aos-delay="300">
                                <div class="features-img">
                                    <img class="injectable" src="assets/images/icon-img/gift.svg" alt="">
                                </div>
                                <h3>Gift Vouchers</h3>
                                <p>Suspendisse sit amet accumsan massa, et ullamcorper purus</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 mb-6">
                            <div class="features-wrap text-center" data-aos="fade-up" data-aos-delay="400">
                                <div class="features-img">
                                    <img class="injectable" src="assets/images/icon-img/car.svg" alt="">
                                </div>
                                <h3>Free Delivery</h3>
                                <p>Suspendisse sit amet accumsan massa, et ullamcorper purus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area section-padding-lr-1 section-padding-3">
            <div class="container-fluid">
                <div class="section-title mb-12 text-center">
                    <h2 data-aos="fade-up" data-aos-delay="200">New Arrival</h2>
                </div>
                
                <div class="tab-style-1 nav mb-10" data-aos="fade-up" data-aos-delay="300">
                    <!-- <a class="active" href="#pro-1" data-bs-toggle="tab">ALL </a> -->
                    <a href="#pro-2" data-bs-toggle="tab" class="active">Bridal</a>
                    <a href="#pro-3" data-bs-toggle="tab" class=""> Formal </a>
                    <a href="#pro-4" data-bs-toggle="tab">Men</a>
                    <a href="#pro-5" data-bs-toggle="tab">Designer</a>
                </div>
<!-- Main Product Listing Section -->
<div class="tab-content jump padding-54-row-col">
<!-- Bridal -->
<div id="pro-2" class="tab-pane active">
    <div class="row mb-n10">
        <?php
        $query1 = "SELECT p.pro_id, p.pro_name, p.pro_desc, p.pro_price, p.pro_size, p.pro_img, c.cat_name, s.subname 
                  FROM product p
                  INNER JOIN category c ON p.pro_catidfk = c.cat_id
                  INNER JOIN subcategory s ON p.pro_subidfk = s.subid
                  WHERE c.cat_name = 'Bridal'";
        $result1 = mysqli_query($conn, $query1);

        if (!$result1) {
            die('Error in SQL query: ' . mysqli_error($conn));
        }

        while ($row1 = mysqli_fetch_array($result1)) {
            ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                <div class="product-wrap">
                    <div class="product-img img-zoom mb-4">
                        <a href="uproduct-details.php?pid=<?php echo $row1['pro_id']; ?>">
                            <img class="default-img" src="admin/images/<?php echo $row1['pro_img']; ?>" alt="" style="width: 100%; height: 600px; object-fit: cover;">
                        </a>
                        <div class="product-action-wrap">
                            <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModall<?php echo $row1['pro_id']; ?>">
                                <img class="injectable" src="assets/images/icon-img/eye.svg" alt="">
                            </button>
                            <!-- <button title="Add To Cart">
                                <img class="injectable" src="assets/images/icon-img/bag-2.svg" alt="">
                            </button> -->
                            <form action="uwishlist.php" method="post" style="display:inline;">
    <input type="hidden" name="product_id" value="<?php echo $row1['pro_id']; ?>">
    <button type="submit" title="Wishlist">
        <img class="injectable" src="assets/images/icon-img/heart.svg" alt="">
    </button>
</form>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="uproduct-details.php?pid=<?php echo $row1['pro_id']; ?>"><?php echo $row1['pro_name']; ?></a></h3>
                        <div class="product-price">
                            <span><?php echo $row1['pro_price']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Section -->
            <div class="modal fade" id="exampleModall<?php echo $row1['pro_id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-5 col-md-12 col-12">
                                    <div class="quickview-img">
                                        <a href="uproduct-details.php?pid=<?php echo $row1['pro_id']; ?>">
                                            <img src="admin/images/<?php echo $row1['pro_img']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12 col-12">
                                    <div class="product-details-content quickview-content">
                                        <h2><?php echo $row1['pro_name']; ?></h2>
                                        <div class="product-details-price">
                                            <span><?php echo $row1['pro_price']; ?></span>
                                        </div>
                                        <p><?php echo $row1['pro_desc']; ?></p>
                                        <div class="product-details-quality-cart">

                                            <div class="product-details-cart">
                                                <form action="ucart.php" method="post">
                                                    <!-- <div class="product-quality">
                                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                                    </div> -->
                                                    <input type="hidden" name="hide_id" value="<?php echo $row1['pro_id']; ?>">
                                                    <input type="hidden" name="hide_name" value="<?php echo $row1['pro_name']; ?>">
                                                    <input type="hidden" name="hide_price" value="<?php echo $row1['pro_price']; ?>">
                                                    <input type="hidden" name="hide_img" value="<?php echo $row1['pro_img']; ?>">
                                                    <div class="total my-3">
                                                        <button class="btn btn-outline-dark" name="btncart">Add To Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-details-meta-wrap">
                                            <div class="product-details-meta">
                                                <span>Size:</span>
                                                <ul>
                                                    <li><?php echo $row1['pro_size']; ?></li>
                                                </ul>
                                            </div>
                                            <div class="product-details-meta">
                                                <span>Categories: </span>
                                                <ul>
                                                    <li><a href="#"><?php echo $row1['subname']; ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-details-meta">
                                                <span>Product ID: </span>
                                                <ul>
                                                    <li>PRO<?php echo $row1['pro_id']; ?></li>
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
        ?>
    </div>
</div>
<!-- Formal -->
<div id="pro-3" class="tab-pane">
    <div class="row mb-n10">
        <?php
        $query2 = "SELECT p.pro_id, p.pro_name, p.pro_desc, p.pro_price, p.pro_size, p.pro_img, c.cat_name, s.subname 
                  FROM product p
                  INNER JOIN category c ON p.pro_catidfk = c.cat_id
                  INNER JOIN subcategory s ON p.pro_subidfk = s.subid
                  WHERE c.cat_name = 'Formal'";
        $result2 = mysqli_query($conn, $query2);

        if (!$result2) {
            die('Error in SQL query: ' . mysqli_error($conn));
        }

        while ($row2 = mysqli_fetch_array($result2)) {
            ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                <div class="product-wrap">
                    <div class="product-img img-zoom mb-4">
                        <a href="uproduct-details.php?pid=<?php echo $row2['pro_id']; ?>">
                            <img class="default-img" src="admin/images/<?php echo $row2['pro_img']; ?>" alt="" style="width: 100%; height: 600px; object-fit: cover;">
                        </a>
                        <div class="product-action-wrap">
                            <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModall<?php echo $row2['pro_id']; ?>">
                                <img class="injectable" src="assets/images/icon-img/eye.svg" alt="">
                            </button>
                            <!-- <button title="Add To Cart">
                                <img class="injectable" src="assets/images/icon-img/bag-2.svg" alt="">
                            </button> -->
                            <form action="uwishlist.php" method="post" style="display:inline;">
    <input type="hidden" name="product_id" value="<?php echo $row2['pro_id']; ?>">
    <button type="submit" title="Wishlist">
        <img class="injectable" src="assets/images/icon-img/heart.svg" alt="">
    </button>
</form>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="uproduct-details.php?pid=<?php echo $row2['pro_id']; ?>"><?php echo $row2['pro_name']; ?></a></h3>
                        <div class="product-price">
                            <span><?php echo $row2['pro_price']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Section -->
            <div class="modal fade" id="exampleModall<?php echo $row2['pro_id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-5 col-md-12 col-12">
                                    <div class="quickview-img">
                                        <a href="uproduct-details.php?pid=<?php echo $row2['pro_id']; ?>">
                                            <img src="admin/images/<?php echo $row2['pro_img']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12 col-12">
                                    <div class="product-details-content quickview-content">
                                        <h2><?php echo $row2['pro_name']; ?></h2>
                                        <div class="product-details-price">
                                            <span><?php echo $row2['pro_price']; ?></span>
                                        </div>
                                        <p><?php echo $row2['pro_desc']; ?></p>
                                        <div class="product-details-quality-cart">

                                            <div class="product-details-cart">
                                                <form action="ucart.php" method="post">
                                                    <!-- <div class="product-quality">
                                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                                    </div> -->
                                                    <input type="hidden" name="hide_id" value="<?php echo $row2['pro_id']; ?>">
                                                    <input type="hidden" name="hide_name" value="<?php echo $row2['pro_name']; ?>">
                                                    <input type="hidden" name="hide_price" value="<?php echo $row2['pro_price']; ?>">
                                                    <input type="hidden" name="hide_img" value="<?php echo $row2['pro_img']; ?>">
                                                    <div class="total my-3">
                                                        <button class="btn btn-outline-dark" name="btncart">Add To Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-details-meta-wrap">
                                            <div class="product-details-meta">
                                                <span>Size:</span>
                                                <ul>
                                                    <li><?php echo $row2['pro_size']; ?></li>
                                                </ul>
                                            </div>
                                            <div class="product-details-meta">
                                                <span>Categories: </span>
                                                <ul>
                                                    <li><a href="#"><?php echo $row2['subname']; ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-details-meta">
                                                <span>Product ID: </span>
                                                <ul>
                                                    <li>PRO<?php echo $row2['pro_id']; ?></li>
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
        ?>
    </div>
</div>
<!-- -------------mens------- -->
<div id="pro-4" class="tab-pane">
    <div class="row mb-n10">
        <?php
        $query3 = "SELECT p.pro_id, p.pro_name, p.pro_desc, p.pro_price, p.pro_size, p.pro_img, c.cat_name, s.subname 
                  FROM product p
                  INNER JOIN category c ON p.pro_catidfk = c.cat_id
                  INNER JOIN subcategory s ON p.pro_subidfk = s.subid
                  WHERE c.cat_name = 'Men''s'";
        $result3 = mysqli_query($conn, $query3);

        if (!$result3) {
            die('Error in SQL query: ' . mysqli_error($conn));
        }

        while ($row3 = mysqli_fetch_array($result3)) {
            ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                <div class="product-wrap">
                    <div class="product-img img-zoom mb-4">
                        <a href="uproduct-details.php?pid=<?php echo $row3['pro_id']; ?>">
                            <img class="default-img" src="admin/images/<?php echo $row3['pro_img']; ?>" alt="" style="width: 100%; height: 600px; object-fit: cover;">
                        </a>
                        <div class="product-action-wrap">
                            <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModall<?php echo $row3['pro_id']; ?>">
                                <img class="injectable" src="assets/images/icon-img/eye.svg" alt="">
                            </button>
                            <!-- <button title="Add To Cart">
                                <img class="injectable" src="assets/images/icon-img/bag-2.svg" alt="">
                            </button> -->
                            <form action="uwishlist.php" method="post" style="display:inline;">
    <input type="hidden" name="product_id" value="<?php echo $row3['pro_id']; ?>">
    <button type="submit" title="Wishlist">
        <img class="injectable" src="assets/images/icon-img/heart.svg" alt="">
    </button>
</form>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="uproduct-details.php?pid=<?php echo $row3['pro_id']; ?>"><?php echo $row3['pro_name']; ?></a></h3>
                        <div class="product-price">
                            <span><?php echo $row3['pro_price']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Section -->
            <div class="modal fade" id="exampleModall<?php echo $row3['pro_id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-5 col-md-12 col-12">
                                    <div class="quickview-img">
                                        <a href="uproduct-details.php?pid=<?php echo $row3['pro_id']; ?>">
                                            <img src="admin/images/<?php echo $row3['pro_img']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12 col-12">
                                    <div class="product-details-content quickview-content">
                                        <h2><?php echo $row3['pro_name']; ?></h2>
                                        <div class="product-details-price">
                                            <span><?php echo $row3['pro_price']; ?></span>
                                        </div>
                                        <p><?php echo $row3['pro_desc']; ?></p>
                                        <div class="product-details-quality-cart">

                                            <div class="product-details-cart">
                                                <form action="ucart.php" method="post">
                                                    <!-- <div class="product-quality">
                                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                                    </div> -->
                                                    <input type="hidden" name="hide_id" value="<?php echo $row3['pro_id']; ?>">
                                                    <input type="hidden" name="hide_name" value="<?php echo $row3['pro_name']; ?>">
                                                    <input type="hidden" name="hide_price" value="<?php echo $row3['pro_price']; ?>">
                                                    <input type="hidden" name="hide_img" value="<?php echo $row3['pro_img']; ?>">
                                                    <div class="total my-3">
                                                        <button class="btn btn-outline-dark" name="btncart">Add To Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-details-meta-wrap">
                                            <div class="product-details-meta">
                                                <span>Size:</span>
                                                <ul>
                                                    <li><?php echo $row3['pro_size']; ?></li>
                                                </ul>
                                            </div>
                                            <div class="product-details-meta">
                                                <span>Categories: </span>
                                                <ul>
                                                    <li><a href="#"><?php echo $row3['subname']; ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-details-meta">
                                                <span>Product ID: </span>
                                                <ul>
                                                    <li>PRO<?php echo $row3['pro_id']; ?></li>
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
        ?>
    </div>
</div>
<!-- --------------designer----------- -->
<div id="pro-5" class="tab-pane">
    <div class="row mb-n10">
        <?php
        $query4 = "SELECT p.pro_id, p.pro_name, p.pro_desc, p.pro_price, p.pro_size, p.pro_img, c.cat_name, s.subname 
                  FROM product p
                  INNER JOIN category c ON p.pro_catidfk = c.cat_id
                  INNER JOIN subcategory s ON p.pro_subidfk = s.subid
                  WHERE c.cat_name = 'Designer'";
        $result4 = mysqli_query($conn, $query4);

        if (!$result4) {
            die('Error in SQL query: ' . mysqli_error($conn));
        }

        while ($row4 = mysqli_fetch_array($result4)) {
            ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-10">
                <div class="product-wrap">
                    <div class="product-img img-zoom mb-4">
                        <a href="uproduct-details.php?pid=<?php echo $row4['pro_id']; ?>">
                            <img class="default-img" src="admin/images/<?php echo $row4['pro_img']; ?>" alt="" style="width: 100%; height: 600px; object-fit: cover;">
                        </a>
                        <div class="product-action-wrap">
                            <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModall<?php echo $row4['pro_id']; ?>">
                                <img class="injectable" src="assets/images/icon-img/eye.svg" alt="">
                            </button>
                            <!-- <button title="Add To Cart">
                                <img class="injectable" src="assets/images/icon-img/bag-2.svg" alt="">
                            </button> -->
                            <form action="uwishlist.php" method="post" style="display:inline;">
    <input type="hidden" name="product_id" value="<?php echo $row4['pro_id']; ?>">
    <button type="submit" title="Wishlist">
        <img class="injectable" src="assets/images/icon-img/heart.svg" alt="">
    </button>
</form>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h3><a href="uproduct-details.php?pid=<?php echo $row4['pro_id']; ?>"><?php echo $row4['pro_name']; ?></a></h3>
                        <div class="product-price">
                            <span><?php echo $row4['pro_price']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Section -->
            <div class="modal fade" id="exampleModall<?php echo $row4['pro_id']; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-5 col-md-12 col-12">
                                    <div class="quickview-img">
                                        <a href="uproduct-details.php?pid=<?php echo $row4['pro_id']; ?>">
                                            <img src="admin/images/<?php echo $row4['pro_img']; ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12 col-12">
                                    <div class="product-details-content quickview-content">
                                        <h2><?php echo $row4['pro_name']; ?></h2>
                                        <div class="product-details-price">
                                            <span><?php echo $row4['pro_price']; ?></span>
                                        </div>
                                        <p><?php echo $row4['pro_desc']; ?></p>
                                        <div class="product-details-quality-cart">

                                            <div class="product-details-cart">
                                                <form action="ucart.php" method="post">
                                                    <!-- <div class="product-quality">
                                                        <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                                                    </div> -->
                                                    <input type="hidden" name="hide_id" value="<?php echo $row4['pro_id']; ?>">
                                                    <input type="hidden" name="hide_name" value="<?php echo $row4['pro_name']; ?>">
                                                    <input type="hidden" name="hide_price" value="<?php echo $row4['pro_price']; ?>">
                                                    <input type="hidden" name="hide_img" value="<?php echo $row4['pro_img']; ?>">
                                                    <div class="total my-3">
                                                        <button class="btn btn-outline-dark" name="btncart">Add To Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product-details-meta-wrap">
                                            <div class="product-details-meta">
                                                <span>Size:</span>
                                                <ul>
                                                    <li><?php echo $row4['pro_size']; ?></li>
                                                </ul>
                                            </div>
                                            <div class="product-details-meta">
                                                <span>Categories: </span>
                                                <ul>
                                                    <li><a href="#"><?php echo $row4['subname']; ?></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-details-meta">
                                                <span>Product ID: </span>
                                                <ul>
                                                    <li>PRO<?php echo $row4['pro_id']; ?></li>
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
        ?>
    </div>
</div>
                </div>
            </div>
        </div>
        <div class="product-area bg-gray section-padding-4 overflow-hidden">
    <div class="container-fluid p-0">
        <div class="product-area-wrap">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-4">
                    <div class="section-title mb-10">
                        <h2 data-aos="fade-up" data-aos-delay="200">Shop Now</h2>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="product-slider-active nav-style-2" data-aos="fade-up" data-aos-delay="200">
                        <?php
                        $qqq = "SELECT * FROM productdata ORDER BY pro_id ASC LIMIT 5"; 
                        $rrr = mysqli_query($conn, $qqq);

                        while ($row = mysqli_fetch_array($rrr)) {
                        ?>
                            <div class="product-plr-1">
                                <div class="product-wrap">
                                    <div class="product-img img-zoom mb-5">
                                        <input type="hidden" value="<?php echo $row['pro_id']; ?>">
                                        <a href="uproduct-details.php?pid=<?php echo $row['pro_id']; ?>">
                                            <img class="default-img" src="<?php echo "admin/images/" . $row['pro_img']; ?>" alt="" style="width: 100%; height: 450px; object-fit: cover;">
                                        </a>
                                    </div>
                                    <div class="product-content-2">
                                        <h3><a href="uproduct-details.php"><?php echo $row['pro_name']; ?></a></h3>
                                        <!-- Example discount display -->
                                        <!-- <span>OFF 30%</span> -->
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="subscribe-area section-padding-5 bg-img" style="background-image:url(assets/images/slider/web-Banners-1_1512x.jpg)">
    <div class="container my-5 py-5">
        <div class="subscribe-content">
            <div class="section-title mb-12 text-center">
            </div>
            <div id="mc_embed_signup" class="subscribe-form" data-aos="fade-up" data-aos-delay="400">
            </div>
        </div>
    </div>
</div>
<!-- ---------------branding----------------- -->
        <div class="brand-logo section-padding-lr-1 section-padding-8 mt-5">
    <div class="container-fluid">
        <div class="brand-logo-active">
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="200">
                <div class="single-brand-logo">
                    <img src="//rentitonline.pk/cdn/shop/files/4_360x.png?v=1614854722" alt="Elan">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="300">
                <div class="single-brand-logo">
                    <img src="//rentitonline.pk/cdn/shop/files/10_360x.png?v=1614854849" alt="Sana Safinaz">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="400">
                <div class="single-brand-logo">
                    <img src="//rentitonline.pk/cdn/shop/files/7_360x.png?v=1614854778" alt="Zara Shahjahan">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="500">
                <div class="single-brand-logo">
                    <img src="//rentitonline.pk/cdn/shop/files/2_360x.png?v=1614854695" alt="Suffuse">
                </div>
            </div>
            <div class="brand-logo-plr-1" data-aos="fade-up" data-aos-delay="700">
                <div class="single-brand-logo">
                    <img src="//rentitonline.pk/cdn/shop/files/6_360x.png?v=1614854762" alt="Sania Maskatiya">
                </div>
            </div>
        </div>
    </div>
</div>

        <?php
include("ufooter.php");
?>
        <!-- Modal -->

        <!-- Modal end -->
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