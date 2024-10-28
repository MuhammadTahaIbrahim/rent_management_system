<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php
include("config.php");
// Fetch city data for editing
if (isset($_GET['edit_id'])) {
    $eid = (int)$_GET['edit_id'];
    $query = "SELECT * FROM city WHERE cid = $eid";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

// Handle form submission for updating city
if (isset($_POST["btnup"])) {
    $up_id = $_POST["hideid"];
    $up_name = $_POST["cname"];

    $query = "UPDATE city SET cname = ? WHERE cid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $up_name, $up_id);

    if ($stmt->execute()) {
        echo "<script>location.href='showcity.php';</script>";
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
              <h3 class="page-title"> City</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">City</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update City</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"></h4>
                    <p class="card-description"> </p>
           <form method="post">
                <input type="hidden" name="hideid" value="<?php echo $row['cid']; ?>">
                <div class="form-group m-5">
                    <label for="catname">City Name :</label>
                    <input type="text" class="form-control" value="<?php echo $row['cname']; ?>" id="cname" name="cname" placeholder="Enter Category">
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