<?php
include("header.php");
?>
<?php
if (isset($_SESSION['logname']) && isset($_SESSION['loguemail'])) {
    // Determine the redirect URL based on the 'checkout' parameter
    $redirectTo = isset($_GET['checkout']) ? 'checkout.php' : 'uindex.php';
    echo "<script>
        window.onload = function() {
            window.location.href = '$redirectTo';
        };
    </script>";
    exit();
}
?>

<div class="breadcrumb-area breadcrumb-padding-6">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <div class="breadcrumb-title">
                <h2>Login - Register </h2>
            </div>
            <ul>
                <li>
                    <a href="index.php">HOME</a>
                </li>
                <li>>
                </li>
                <li>LOGIN - REGISTER </li>
            </ul>
        </div>
    </div>
</div>
<!-- ------php work -->
<!-- for user login and registration -->

<?php
include("config.php");

if(isset($_POST['btnsub'])) {
    $name = $_POST['username'];
    $email = $_POST['useremail'];
    $pass = $_POST['userpass'];
    
    // Check if the email already exists
    $check_query = "SELECT * FROM user WHERE user_email = '".$email."'";
    $check_result = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('This email is already in use. Please choose a different email.')</script>";
    } else {
        // Proceed with registration
        $query = "INSERT INTO user(user_name, user_email, user_pass)
                  VALUES ('".$name."', '".$email."', '".$pass."')";

        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>alert('Registration successful')</script>";
        } else {
            echo "<script>alert('Registration failed')</script>";
        }
    }
} 


if(isset($_POST['logsub'])) {
    $logemail = $_POST['loguemail'];
    $logpass = $_POST['logupass'];
    $redirectTo = $_POST['redirect_to'];

    $query = "SELECT * FROM user WHERE user_email = '".$logemail."'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    $signpass = $row['user_pass'];
    $signnames = $row['user_name'];
    $signemail = $row['user_email'];
    // session_start();
    $_SESSION['logname']=$signnames;
    $_SESSION['loguemail']=$signemail;
    if($logpass === $signpass){
        if ($redirectTo == "checkout") {
            echo '<script>window.location.href = "checkout.php"</script>';
        } else {
            echo '<script>window.location.href = "uindex.php"</script>';
        }
    } else {
        echo "<script>alert('Incorrect user Email or Password')</script>";
    }
} 

?>
<div class="login-register-area pb-130">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="email" name="loguemail" placeholder="Useremail">
                                        <input type="hidden" name="redirect_to" value="<?php echo isset($_GET['checkout']) ? 'checkout' : ''; ?>">
                                        <input type="password" name="logupass" placeholder="Password">
                                        <div class="button-box">
                                            <button type="submit"  name="logsub">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="text" name="username" placeholder="Username">
                                        <input type="password" name="userpass" placeholder="Password">
                                        <input name="useremail" placeholder="Email" type="email">
                                        <div class="button-box">
                                            <button type="submit" name="btnsub">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
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
</body>

</html>
