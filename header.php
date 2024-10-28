<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dressify - Fashion eCommerce Website</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Outeli Fashion eCommerce Bootstrap 5 Template is a stunning e-commerce website template that is the best choice for any online store.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- All CSS is here
    ============================================ -->
    <link rel="stylesheet" href="assets/css/vendor/proximanova.css" />
    <link rel="stylesheet" href="assets/css/vendor/line-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/slick.css" />
    <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/slinky.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css" />
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/plugins/easyzoom.css" />
    <link rel="stylesheet" href="assets/css/plugins/select2.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Include jQuery -->
</head>

<body>
<?php
$cart_count = 0;
if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $item) {
        if (isset($item['Qty'])) {
            $cart_count += $item['Qty'];
        }
    }
}
?>
    <div class="main-wrapper wrapper-2">
        <header class="header-area section-padding-lr-1 transparent-bar header-padding-tb sticky-bar sticky-white-bg">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="language-wrap">
                            <!-- <ul>
                                <li><a href="#">ENG</a></li>
                                <li><a href="#">FR</a></li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="logo text-center">
                            <a href="index.php"><img src="assets/images/logo/logod.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="header-action-wrap">
                            <div class="header-action-cart">
                                <a class="cart-active" href="#">
                                    <img class="injectable" src="assets/images/icon-img/bag.svg" alt="">
                                    <span class="product-count"><?php echo $cart_count; ?></span>
                                </a>
                            </div>
                            <div class="header-action-menu">
                                <a class="menu-active-button" href="#">
                                    <span class="info-width-1"></span>
                                    <span class="info-width-2"></span>
                                    <span class="info-width-3"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

<!-- mini cart start -->
<div class="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close" href="#"><i class="las la-times"></i></a>
        <div class="cart-content">
            <h3>Shopping Cart</h3>
            <ul>
                <?php
                if (!empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $item) {
                        if (isset($item['ID'], $item['Name'], $item['Img'], $item['Price'], $item['Qty'])) {
                            $product_id = $item['ID'];
                            $product_name = $item['Name'];
                            $product_image = 'admin/images/' . $item['Img']; 
                            $product_price = $item['Price'];
                            $quantity = $item['Qty'];
                            ?>
                            <li class="single-product-cart">
                                <div class="cart-img">
                                    <a href="product-details.php"><img src="<?php echo $product_image; ?>" alt=""></a>
                                </div>
                                <div class="cart-title">
                                    <h4><a href="product-details.php"><?php echo $product_name; ?></a></h4>
                                    <span><?php echo $quantity; ?> × Rs<?php echo number_format($product_price, 2); ?></span>
                                </div>
                                <div class="cart-delete">
                                    <form action="" method="post" style="display: inline;">
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                        <button type="submit" style="border: none; background: none; cursor: pointer;"><i class="las la-trash"></i></button>
                                    </form>
                                </div>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="single-product-cart">
                                <p>Invalid item in cart:</p>
                                <pre><?php var_dump($item); ?></pre>
                            </li>
                            <?php
                        }
                    }
                } else {
                    ?>
                    <li class="single-product-cart">
                        <p>Your cart is empty.</p>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div class="cart-total">
                <?php
                $subtotal = 0;
                if (!empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $item) {
                        if (isset($item['Price'], $item['Qty'])) {
                            $subtotal += $item['Price'] * $item['Qty'];
                        }
                    }
                }
                ?>
                <h4>Subtotal: <span>Rs<?php echo number_format($subtotal, 2); ?></span></h4>
            </div>
            <div class="btn-style cart-checkout-btn">
                <a class="btn btn-outline-primary" href="cart.php">View cart</a>
                <a class="btn btn-outline-primary" href="checkout.php">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- mini cart end -->
<?php
// Check if the form submission for removal is detected
if (isset($_POST['action']) && $_POST['action'] == 'remove') {
    $product_id = $_POST['product_id'];

    // Remove item from cart
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['ID'] == $product_id) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
                break;
            }
        }
    }

    // Show alert and redirect
    echo "<script>alert('Product removed from your cart');</script>";
    echo "<script>window.location.href = '" . $_SERVER['PHP_SELF'] . "';</script>";
    exit();
}

// Other code to display the mini cart and handle other logic
?>


        <!-- Menu start -->
        <div class="off-canvas-active">
            <a class="off-canvas-close"><i class="las la-times"></i></a>
            <div class="off-canvas-wrap">
                <div class="menu-wrap">
                    <div id="menu" class="slinky-mobile-menu text-left">
                        <ul>
                            <li>
                                <a href="index.php">HOME</a>
                            </li>
                            <?php
                            $query = "SELECT c.cat_id, c.cat_name, s.subid, s.subname 
                                      FROM category c 
                                      INNER JOIN subcategory s ON c.cat_id = s.subid_fk
                                      ORDER BY c.cat_id, s.subid"; // Ensure proper order

                            $result = mysqli_query($conn, $query);

                            if (!$result) {
                                die("Query failed: " . mysqli_error($conn));
                            }

                            $categories = [];
                            while ($row = mysqli_fetch_assoc($result)) {
                                $categories[$row['cat_id']]['cat_name'] = $row['cat_name'];
                                $categories[$row['cat_id']]['subcategories'][] = [
                                    'subid' => $row['subid'],
                                    'subname' => $row['subname']
                                ];
                            }

                            foreach ($categories as $cat_id => $category) {
                                echo "<li><a href='shop.php?cid=$cat_id'>" . $category['cat_name'] . "</a><ul>";
                                foreach ($category['subcategories'] as $subcategory) {
                                    echo "<li><a href='shop.php?scid=" . $subcategory['subid'] . "'>" . $subcategory['subname'] . "</a></li>";
                                }
                                echo "</ul></li>";
                            }
                            ?>
                            <li>
                                <a href="#">BLOG</a>
                                <ul>
                                <li><a href="blog.php">BLOG</a></li>
                                    <!-- <li><a href="blog-details.php">Blog Details</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="login-register.php">LOGIN/REGISTER</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu end -->

    </div>
