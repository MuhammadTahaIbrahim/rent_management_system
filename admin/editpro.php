<?php
include("_navbar.php");
include("_sidebar.php");
?>

<?php
include("config.php");

if (isset($_GET['edit_id'])) {
    $eid = $_GET['edit_id'];
    $stmt = $conn->prepare("SELECT * FROM product WHERE pro_id = ?");
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

if (isset($_POST["btnup"])) {
    $up_id = $_POST["hideid"];
    $up_name = $_POST["proname"];
    $up_price = $_POST["proprice"];
    $up_desc = $_POST["prodesc"];
    $up_size = $_POST["prosize"];
    $up_catfk = $_POST["catid"];
    $up_subfk = $_POST["subid"];
    $target_dir = "images/";
    $up_img = $_FILES["proimg"]["name"];
    $target_file = $target_dir . basename($up_img);

    if (!empty($up_img)) {
        if (move_uploaded_file($_FILES["proimg"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("UPDATE product SET pro_name = ?, pro_price = ?, pro_desc = ?, pro_size = ?, pro_catidfk = ?, pro_subidfk = ?, pro_img = ? WHERE pro_id = ?");
            $stmt->bind_param("ssssissi", $up_name, $up_price, $up_desc, $up_size, $up_catfk, $up_subfk, $up_img, $up_id);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        $stmt = $conn->prepare("UPDATE product SET pro_name = ?, pro_price = ?, pro_desc = ?, pro_size = ?, pro_catidfk = ?, pro_subidfk = ? WHERE pro_id = ?");
        $stmt->bind_param("ssssiii", $up_name, $up_price, $up_desc, $up_size, $up_catfk, $up_subfk, $up_id);
    }
    
    if ($stmt->execute()) {
        echo "<script>location.href='showpro.php';</script>";
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
      <h3 class="page-title">Update Product</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page">Update Product</li>
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
              <input type="hidden" name="hideid" value="<?php echo $row['pro_id']; ?>">
              <div class="form-group mb-2">
                <label for="proname">Product Name :</label>
                <input type="text" class="form-control" value="<?php echo $row['pro_name']; ?>" id="proname" name="proname" placeholder="Enter Product Name">
              </div>
              <div class="form-group mb-2">
                <label for="proprice">Product Price</label>
                <input type="text" class="form-control form-control-lg" value="<?php echo $row['pro_price']; ?>" id="proprice" placeholder="Update Product Price" name="proprice">
              </div>
              <div class="form-group mb-2">
                <label for="prodesc">Product Description</label>
                <textarea class="form-control" id="prodesc" rows="3" placeholder="Update Product Description" name="prodesc"><?php echo $row['pro_desc']; ?></textarea>
              </div>
              <div class="form-group mb-2">
                <label for="prosize">Update Size :</label>
                <select class="form-control" id="prosize" name="prosize">
                  <option value="XS" <?php echo ($row['pro_size'] == 'XS') ? 'selected' : ''; ?>>XS</option>
                  <option value="S" <?php echo ($row['pro_size'] == 'S') ? 'selected' : ''; ?>>S</option>
                  <option value="M" <?php echo ($row['pro_size'] == 'M') ? 'selected' : ''; ?>>M</option>
                  <option value="L" <?php echo ($row['pro_size'] == 'L') ? 'selected' : ''; ?>>L</option>
                  <option value="XL" <?php echo ($row['pro_size'] == 'XL') ? 'selected' : ''; ?>>XL</option>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="catid">Main Category Name :</label>
                <select class="form-control form-control-lg" name="catid">
                  <?php
                  $q = "SELECT * FROM category";
                  $result2 = mysqli_query($conn, $q);
                  while ($row1 = mysqli_fetch_array($result2)) {
                      ?>
                      <option value="<?php echo $row1['cat_id'] ?>" <?php echo ($row['pro_catidfk'] == $row1['cat_id']) ? 'selected' : ''; ?>>
                          <?php echo $row1['cat_name'] ?>
                      </option>
                      <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="subid">Sub Category Name :</label>
                <select class="form-control form-control-lg" name="subid">
                  <?php
                  $q = "SELECT * FROM subcategory";
                  $result2 = mysqli_query($conn, $q);
                  while ($row1 = mysqli_fetch_array($result2)) {
                      ?>
                      <option value="<?php echo $row1['subid'] ?>" <?php echo ($row['pro_subidfk'] == $row1['subid']) ? 'selected' : ''; ?>>
                          <?php echo $row1['subname'] ?>
                      </option>
                      <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="proimg">Product Image</label>
                <input type="file" class="form-control form-control-lg" id="proimg" name="proimg">
                <img src="images/<?php echo $row['pro_img']; ?>" alt="" width="100" height="100" class="img-thumbnail mt-2">
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
