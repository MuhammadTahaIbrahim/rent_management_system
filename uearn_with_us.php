<script>
function validateForm() {
    let name = document.querySelector("input[name='l_name']").value;
    let email = document.querySelector("input[name='l_email']").value;
    let phone = document.querySelector("input[name='l_phone']").value;
    let fileInput = document.querySelector("input[name='l_img']");
    let file = fileInput.files[0];

    // Name validation
    if (name.trim() === "") {
        alert("Please enter your name.");
        return false;
    }

    // Email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Phone validation (assuming 11 digits)
    const phonePattern = /^\d{11}$/;
    if (!phonePattern.test(phone)) {
        alert("Please enter a valid phone number with exactly 11 digits.");
        return false;
    }

    // File validation
    if (file) {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(file.type)) {
            alert("Please upload a valid image file (JPEG, PNG, GIF).");
            return false;
        }

        // Optional: Check file size (e.g., max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert("File size must be less than 5MB.");
            return false;
        }
    }

    return true;
}
</script>

<?php
include("uheader.php");
include("admin/config.php");

$user_name = isset($_SESSION['logname']) ? $_SESSION['logname'] : ''; // Get user name if logged in
$user_email = isset($_SESSION['loguemail']) ? $_SESSION['loguemail'] : ''; // Get user email if logged in

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = trim($_POST['l_name']);
    $email = trim($_POST['l_email']);
    $phone = trim($_POST['l_phone']);
    $message = $_FILES['l_img']['name'];
    $target_dir = "admin/images/";
    $target_file = $target_dir . basename($_FILES["l_img"]["name"]);
    $uploadOk = 1;

    // Server-side validation
    $errors = [];

    if (empty($name) || !preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Please enter a valid name.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($phone) || !preg_match("/^\d{11}$/", $phone)) {
        $errors[] = "Please enter a valid 11-digit phone number.";
    }

    if ($_FILES["l_img"]["error"] == UPLOAD_ERR_OK) {
        $fileType = mime_content_type($_FILES["l_img"]["tmp_name"]);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Please upload a valid image file (JPEG, PNG, GIF).";
            $uploadOk = 0;
        }

        if ($_FILES["l_img"]["size"] > 5 * 1024 * 1024) {
            $errors[] = "File size must be less than 5MB.";
            $uploadOk = 0;
        }
    } else {
        $errors[] = "Error uploading file.";
        $uploadOk = 0;
    }

    if ($uploadOk && empty($errors)) {
        // Move file and insert data into the database
        if (move_uploaded_file($_FILES["l_img"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO lenders (l_name, l_email, l_phone, l_img) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $message);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Thanks! We will contact you soon!');
                        window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                      </script>";
                exit; // Important: Call exit after echoing script
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
    $conn->close();
}

// Check for success message
$success_message = isset($_GET['success']) ? "Thanks! We will contact you soon!" : "";
?>

<div class="breadcrumb-area breadcrumb-padding-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Earn with us</h2>
            </div>
            <ul>
                <li>
                    <a href="uindex.php">HOME</a>
                </li>
                <li>
                    >
                </li>
                <li>EARN WITH US </li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-us-area pb-135">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="grid-container-custom-3">
                    <div>
                        <img src="https://cdn.shopify.com/s/files/1/0354/4855/3604/files/Asset_8.png?v=1613131193"><br>
                        <b>Earn Extra Income</b><br>
                        Make a few extra bucks from the comfort of your own home by listing your outfits on our rental closet.
                    </div>
                    <div>
                        <img src="https://cdn.shopify.com/s/files/1/0354/4855/3604/files/Asset_9.png?v=1613131193"><br>
                        <b>Declutter Your Closet</b><br>
                        Opt for a more mindful lifestyle by gainful elimination of unwanted or unused clothing.
                    </div>
                    <div>
                        <img src="https://cdn.shopify.com/s/files/1/0354/4855/3604/files/Asset_10.png?v=1613131193"><br>
                        <b>Be Sustainable</b><br>
                        Embrace the green revolution and recycle and reuse your clothing for a more sustainable and eco-friendly future.
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-us-wrap">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact-form-wrap">
                        <div class="contact-form-title">
                            <h1>Earn With Us</h1>
                            <?php if ($success_message): ?>
                                <p class="success-message"><?php echo $success_message; ?></p>
                            <?php else: ?>
                                <p>Be A Part Of The Rental Revolution!</p>
                            <?php endif; ?>
                        </div>
                        <form class="contact-form-style padding-20-row-col" id="contact-form" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <input name="l_name" type="text" placeholder="Name*" required value="<?php echo htmlspecialchars($user_name); ?>">
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <input type="email" name="l_email" required placeholder="Email*" value="<?php echo htmlspecialchars($user_email); ?>">
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <input type="tel" name="l_phone" placeholder="Phone*" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <input type="file" name="l_img" accept="image/*" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button class="submit" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact-info-area" style="display: flex; align-items: center; justify-content: center;">
                        <img src="assets/images/banner/lender.jpg" alt="Rental Revolution" style="max-width: 100%; height: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("ufooter.php");
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
<style>
    .grid-container-custom-3 {
        display: flex;
        justify-content: space-between;
        text-align: center;
        margin-top: 20px;
    }

    .grid-container-custom-3 div {
        flex: 1;
        margin: 10px;
    }

    .grid-container-custom-3 img {
        max-width: 100%;
        height: auto;
    }
</style>
</body>
</html>
