<?php
session_start();
if(!isset($_SESSION['adminname'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
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
    <!-- Add this in the <head> section of your HTML -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    
  </head>
  <style>
    .responsive-logo {
    width: 100%;         /* Make the image responsive */
    max-width: 400px;    /* Set maximum width */
    height: auto;        /* Maintain aspect ratio */
}

  </style>
  <body>
    <div class="container-scroller">
      <!--   <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/connect-plus-bootstrap-admin-template/" target="_blank" class="btn me-2 buy-now-btn border-0">Buy Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/connect-plus-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div> 
      </div>-->
      <!-- partial:partials/_navbar.php -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
  <a href="index.php">
    <img src="images/logosvg.png" alt="logo" class="responsive-logo" />
</a>

  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <div class="search-field d-none d-xl-block">
     <!--     <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
       <input type="text" class="form-control bg-transparent border-0" placeholder="Search products">
        </div>
      </form> -->
    </div>
    <ul class="navbar-nav navbar-nav-right">
   <!--    <li class="nav-item  dropdown d-none d-md-block">
        <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Reports </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
          <a class="dropdown-item" href="#">
             <i class="mdi mdi-file-pdf-box me-2"></i>PDF </a> 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
           <i class="mdi mdi-file-excel me-2"></i>Excel </a> 
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
           <i class="mdi mdi-file-word me-2"></i>doc </a> 
        </div>
      </li>
      <li class="nav-item  dropdown d-none d-md-block">
        <a class="nav-link dropdown-toggle" id="projectDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Projects </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="projectDropdown">
          <a class="dropdown-item" href="#">
           <i class="mdi mdi-eye-outline me-2"></i>View Project </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
          <i class="mdi mdi-pencil-outline me-2"></i>Edit Project </a> 
        </div>
      </li>
      <li class="nav-item nav-language dropdown d-none d-md-block">
        <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="nav-language-icon">
            <i class="flag-icon flag-icon-us" title="us" id="us"></i> 
          </div>
          <div class="nav-language-text">
           <p class="mb-1 text-black">English</p> 
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
          <a class="dropdown-item" href="#">
            <div class="nav-language-icon me-2">
            <i class="flag-icon flag-icon-ae" title="ae" id="ae"></i>
            </div>
            <div class="nav-language-text">
              <p class="mb-1 text-black">Arabic</p> 
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <div class="nav-language-icon me-2">
             <i class="flag-icon flag-icon-gb" title="GB" id="gb"></i>
            </div>
            <div class="nav-language-text">
             <p class="mb-1 text-black">English</p> 
            </div>
          </a>
        </div>
      </li> -->
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- <div class="nav-profile-img">
            <img src="../../../assets/images/faces/face28.png" alt="image">
          </div> -->
          <div class="nav-profile-text">
            <p class="mb-1 text-black"><?php echo $_SESSION['adminname']?></p>
          </div>
        </a>
        <div class="dropdown-menu navbar-dropdown dropdown-menu-end p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
          <!-- <div class="p-3 text-center bg-primary">
            <img class="img-avatar img-avatar48 img-avatar-thumb" src="../../../assets/images/faces/face28.png" alt="">
          </div> -->
          <div class="p-2">

            <div role="separator" class="dropdown-divider"></div>
            <h5 class="dropdown-header text-uppercase  ps-2 text-dark mt-2">Actions</h5>

            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="logout.php">
              <span>Log Out</span>
              <i class="mdi mdi-logout ms-1"></i>
            </a>
          </div>
        </div>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="mdi mdi-email-outline"></i>
          <span class="count-symbol bg-success"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="messageDropdown">
          <h6 class="p-3 mb-0 bg-primary text-white py-4">Messages</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../../../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
              <p class="text-gray mb-0"> 1 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../../../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
              <p class="text-gray mb-0"> 15 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img src="../../../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
              <p class="text-gray mb-0"> 18 Minutes ago </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <h6 class="p-3 mb-0 text-center">4 new messages</h6>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
          <i class="mdi mdi-bell-outline"></i>
          <span class="count-symbol bg-danger"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="mdi mdi-calendar"></i>
              </div>
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
              <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="mdi mdi-weather-sunny"></i>
              </div>
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
              <p class="text-gray ellipsis mb-0"> Update dashboard </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="mdi mdi-link-variant"></i>
              </div>
            </div>
            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
              <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
              <p class="text-gray ellipsis mb-0"> New admin wow! </p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <h6 class="p-3 mb-0 text-center">See all notifications</h6>
        </div>
      </li> -->
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>