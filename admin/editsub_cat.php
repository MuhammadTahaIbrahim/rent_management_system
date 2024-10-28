<?php
include("_navbar.php");
include("_sidebar.php");
?>

<?php
include("config.php");

if (isset($_GET['edit_id'])) {
    $eid = $_GET['edit_id'];
    $stmt = $conn->prepare("SELECT * FROM subcategory WHERE subid = ?");
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

if (isset($_POST["btnup"])) {
    $up_id = $_POST["hideid"];
    $up_name = $_POST["subname"];
    $up_subfk = $_POST["subid"];
    $target_dir = "images/";
    $up_img = $_FILES["subimg"]["name"];
    $target_file = $target_dir . basename($up_img);

    if (!empty($up_img)) {
        if (move_uploaded_file($_FILES["subimg"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("UPDATE subcategory SET subname = ?, subid_fk = ?, subimg = ? WHERE subid = ?");
            $stmt->bind_param("sisi", $up_name, $up_subfk, $up_img, $up_id);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        $stmt = $conn->prepare("UPDATE subcategory SET subname = ?, subid_fk = ? WHERE subid = ?");
        $stmt->bind_param("sii", $up_name, $up_subfk, $up_id);
    }

    if ($stmt->execute()) {
        echo "<script>location.href='showsub_cat.php';</script>";
    } else {
        echo "Data was not updated";
    }
    $stmt->close();
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
                <input type="hidden" name="hideid" value="<?php echo $row['subid']; ?>">
                <div class="form-group m-5">
                    <label for="subname">Sub Category Name :</label>
                    <input type="text" class="form-control" value="<?php echo $row['subname']; ?>" id="subname" name="subname" placeholder="Enter Category">
                </div>

                                <div class="form-group m-5">
                    <label for="subid">Main Category Name :</label>
              <select class="form-control form-control-lg" name="subid" value="<?php echo $row["subid_fk"]?>">
                                    <?php
                                    $q = "SELECT * FROM category";
                                    $result2 = mysqli_query($conn, $q);
                                    while ($row1 = mysqli_fetch_array($result2)) {
                                        ?>
                                        <option value="<?php echo $row1['cat_id'] ?>">
                                            <?php echo $row1['cat_name'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                </div>


                  <div class="form-group m-5">
                    <label for="catimg">Category Image</label>
                    <input type="file" class="form-control form-control-lg" id="subimg" name="subimg">
                    <img src="images/<?php echo $row['subimg']; ?>" alt="" width="100" height="100" class="img-thumbnail mt-2">
                </div>
                <input type="submit" value="Update" class="btn btn-primary m-5 mt-0" name="btnup">
            </form>
           <div class="col-md-6 text-success">
                <h4><?php echo @$message; ?></h4>
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