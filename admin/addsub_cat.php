<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php
include("config.php");

if (isset($_POST['btncat'])) {
    $name = $_POST['subname'];
    $subfk = $_POST['subcat'];
    // ---------image
    $img = $_FILES['subimg']['name'];
    $imgloc = $_FILES['subimg']['tmp_name'];

    // Escape special characters in the values to avoid SQL injection
    $name = mysqli_real_escape_string($conn, $name);
     $subfk = mysqli_real_escape_string($conn, $subfk);
    $img = mysqli_real_escape_string($conn, $img);

    if (move_uploaded_file($imgloc, "images/" . $img)) {
        $query = "INSERT INTO subcategory (subname, subid_fk ,subimg) VALUES ('$name', '$subfk' ,'$img')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Sub Category added Successfully')</script>";
        } else {
            echo "<script>alert('Sub Category not added')</script>";
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
              <h3 class="page-title">Sub Category</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Sub Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
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
                    <label for="subname">Sub-Category Name :</label>
                    <input type="text" class="form-control" id="subname" name="subname" placeholder="Enter sub Category">
                </div>
                <!-- ----caid fk -->
                 <div class="form-group m-5">
                                      <label for="exampleInputEmail1">Select main Category</label>
                                  <select  id="" class="form-control form-control-lg"  name="subcat">
                              <?php
                             
                                  $q="SELECT * FROM category";
                                  $result=mysqli_query($conn,$q);
                                  while($row=mysqli_fetch_array($result))
                                  {
                                ?>
                                
                                    <option value="<?php echo $row['cat_id']  ?>"><?php echo $row['cat_name']  ?></option>

                                   <?php
                                    }
                                   ?>
                                      </select>
                                     
                                  </div>
                <div class="form-group m-5">
                    <label for="subimg">Sub-Category Image</label>
                    <input type="file" class="form-control form-control-lg" id="subimg" name="subimg">
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