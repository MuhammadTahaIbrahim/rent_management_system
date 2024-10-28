<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php
include("config.php");

if (isset($_POST['btncat'])) {
    $name = $_POST['catname'];
   
    // ---------image
    $img = $_FILES['catimg']['name'];
    $imgloc = $_FILES['catimg']['tmp_name'];

    // Escape special characters in the values to avoid SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $img = mysqli_real_escape_string($conn, $img);

    if (move_uploaded_file($imgloc, "images/" . $img)) {
        $query = "INSERT INTO category (cat_name, cat_img) VALUES ('$name', '$img')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Category added Successfully')</script>";
        } else {
            echo "<script>alert('Category not added')</script>";
        }
    } else {
        echo "<script>alert('File Not Moved')</script>";
    }
}
?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Category</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                    <p class="card-description"> </p>
                    <form method="post" enctype="multipart/form-data">
                <div class="form-group m-5">
                    <label for="catname">Category Name :</label>
                    <input type="text" class="form-control" id="catname" name="catname" placeholder="Enter Category">
                </div>
                <div class="form-group m-5">
                    <label for="catimg">Category Image</label>
                    <input type="file" class="form-control form-control-lg" id="catimg" name="catimg">
                </div>
                <input type="submit" value="Submit" class="btn btn-primary m-5 mt-0" name="btncat">
            </form>
            <div class="col-md-6 text-success">
                <h4><?php echo @$message ?></h4>
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