
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dressify</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/vertical-light-layout/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <!-- ------------php work----------- -->
  <?php
    session_start();
    include("config.php");

    $message = ""; // Initialize message variable

    if(isset($_POST['btnlog'])){
        $name = $_POST['logname'];
        $pass = $_POST['logpass'];
        
        if($name == "admin" && $pass == "admin"){
            $_SESSION['adminname'] = $name;
            header("location: index.php");
            exit;
        } else {
            $message = "Invalid Email and Password";
        }
    }
    ?>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <!-- <img src="../../assets/images/logo-dark.svg"> -->
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action="" method="post">
                  <div class="form-group">
                  <input type="text" class="form-control" id="floatingInput" placeholder="username" name="logname">
                    <!-- <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="username" name="logname"> -->
                  </div>
                  <div class="form-group">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="logpass">
                    <!-- <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="logpass"> -->
                  </div>
                   
                        <!-- ----message print -->
                        <div class="input-group my-3">
                        <label for="" class="text-danger "><?php echo @$message ?></label>
                        </div>
                  <div class="mt-3">
                    <!-- <a class="btn d-grid btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.php">SIGN IN</a> -->
                    <input type="submit" value="Log In" class="btn btn-primary py-3 w-100 mb-4" name="btnlog">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <!-- <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div> -->
                    <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                  </div>
                  <!-- <div class="mb-2 d-grid gap-2">
                    <button type="button" class="btn  btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
                  </div> -->
                  <!-- <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a> -->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>