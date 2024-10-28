<?php
include("header.php");
include("admin/config.php");

// Assuming user login has been implemented and the user's email is stored in the session
$user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; // Get user email if logged in

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST['contact_name'];
    $email = $_POST['contact_email'];
    $phone = $_POST['contact_phone'];
    $message = $_POST['contact_message'];

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

    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }

    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO contact (contact_name, contact_email, contact_phone, contact_message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);

        if ($stmt->execute()) {
            // Use JavaScript for redirection
            echo "<script>
                    alert('Your message has been sent to admin. We will contact you soon!');
                    window.location.href = '" . $_SERVER['PHP_SELF'] . "';
                  </script>";
            exit; // Important: Call exit after echoing script
        } else {
            echo "Error: " . $stmt->error;
        }
        // Close connections
        $stmt->close();
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}

// Check for success message
$success_message = isset($_GET['success']) ? "Your message has been sent to admin. We will contact you soon!" : "";
?>

<div class="breadcrumb-area breadcrumb-padding-3">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Contact Us</h2>
            </div>
            <ul>
                <li>
                    <a href="index.php">HOME</a>
                </li>
                <li>
                    >
                </li>
                <li>CONTACT US </li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-us-area pb-135">
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d267715.0342542922!2d67.01577947387096!3d24.94321522684364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33d16e2cdb9d1%3A0x6ef8c81887c57c67!2sNorth%20Nazimabad%2C%20Block%20A%2C%20Karachi%2C%20Pakistan!5e0!3m2!1sen!2sin!4v1672940711234"
            width="600"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
    <div class="container">
        <div class="contact-us-wrap">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form-wrap">
                        <div class="contact-form-title">
                            <h1>Get In Touch</h1>
                            <?php if ($success_message): ?>
                                <p class="success-message"><?php echo $success_message; ?></p>
                            <?php else: ?>
                                <p>Comments, questions? Drop us a note, and we’ll get back with you shortly!</p>
                            <?php endif; ?>
                        </div>
                        <form class="contact-form-style padding-20-row-col" id="contact-form" method="post" onsubmit="return validateForm()">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <input name="contact_name" id="contact_name" required type="text" placeholder="Name*" pattern="[a-zA-Z\s]+" title="Name should contain only letters and spaces">
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <input type="email" name="contact_email" id="contact_email" value="<?php echo htmlspecialchars($user_email); ?>" required placeholder="Email*">
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <input type="text" name="contact_phone" id="contact_phone" placeholder="Phone*" required pattern="^\d{11}$" title="Phone number should contain exactly 11 digits">
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <textarea name="contact_message" id="contact_message" required placeholder="Message"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button class="submit" type="submit">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="contact-info-area">
                        <ul>
                            <li><img class="injectable icon-width-1" src="assets/images/icon-img/phone-call.svg" alt=""> <span> +92 858 5858 68</span></li>
                            <li><img class="injectable icon-width-2" src="assets/images/icon-img/email.svg" alt=""> <span>support@hastech.com</span></li>
                            <li><img class="injectable icon-width-4" src="assets/images/icon-img/pin.svg" alt=""> <span>Aptech Computer Education Center، SD-1, Block A <br> North Nazimabad Town, Karachi</span></li>
                        </ul>
                    </div>
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

<script>
function validateForm() {
    let name = document.getElementById("contact_name").value;
    let email = document.getElementById("contact_email").value;
    let phone = document.getElementById("contact_phone").value;

    // Name validation
    const namePattern = /^[a-zA-Z\s]+$/;
    if (!namePattern.test(name)) {
        alert("Please enter a valid name (letters and spaces only).");
        return false;
    }

    // Email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Phone number validation
    const phonePattern = /^\d{11}$/;
    if (!phonePattern.test(phone)) {
        alert("Please enter a valid phone number with exactly 11 digits.");
        return false;
    }

    return true;
}
</script>
</body>

</html>
