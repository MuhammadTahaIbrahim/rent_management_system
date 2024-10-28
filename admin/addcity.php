<?php
include("_navbar.php");
include("_sidebar.php");
include("config.php");

if (isset($_POST['btncat'])) {
    $name = $_POST['city'];
    $name = mysqli_real_escape_string($conn, $name);


    $query = "INSERT INTO city (cname) VALUES ('$name')";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "<script>alert('City added Successfully')</script>";
    } else {
        echo "<script>alert('City not added')</script>";
    }
}
?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">City</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">City</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add City</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                        <h4 class="card-title">Add New City</h4>
                        <form method="post">
                            <div class="form-group m-5">
                                <label for="catname">City Name :</label>
                                <input type="text" class="form-control" id="catname" name="city" placeholder="Enter City Name" required>
                            </div>
                            <input type="submit" value="Submit" class="btn btn-primary m-5 mt-0" name="btncat">
                        </form>
                        <div class="col-md-6 text-success">
                            <h4><?php echo isset($message) ? $message : ''; ?></h4>
                        </div>
                    </div>
                </div>
              </div>

            </div>
          </div>
          <!-- content-wrapper ends -->
        

<?php

include("_footer.php");
?>