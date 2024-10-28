<?php
include("_navbar.php");
include("_sidebar.php");
include("config.php");

// Handle deletion
if (isset($_GET['del_id'])) {
    $del_id = intval($_GET['del_id']);
    
    $del_query = $conn->prepare("DELETE FROM lenders WHERE l_id = ?");
    $del_query->bind_param("i", $del_id);
    
    if ($del_query->execute()) {
        echo "<script>
                alert('Deleted successfully');
                window.location.href='lenders.php';
              </script>";
    } else {
        echo "Error: " . $del_query->error;
    }
    
    $del_query->close();
}


?>
<style>
  .table {
    width: 100%;
    overflow-x: auto; 
}
</style>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
            <h3 class="page-title">Lenders</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Lenders</a></li>
          <li class="breadcrumb-item active" aria-current="page">Show Lenders</li>
                </ol>
              </nav>
            </div>
            <div class="row g-4">
        <div class="col-md-12">
            <div class="table-responsive">
         
                <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Image</th>
              <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
$query = "SELECT * FROM lenders";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
?>
    <tr>
        <td><?php echo htmlspecialchars($row['l_Id']); ?></td>
        <td><?php echo htmlspecialchars($row['l_name']); ?></td>
        <td><?php echo htmlspecialchars($row['l_email']); ?></td>
        <td><?php echo htmlspecialchars($row['l_phone']); ?></td>
        <td><img src="<?php echo "images/" . $row['l_img'] ?>" alt="" width="150" height="150" class="img-thumbnail"></td>
        <td>
            <div class="btn-group">
            <a href="lenderreply.php?reply_id=<?php echo htmlspecialchars($row['l_Id']); ?>" class="btn btn-success">Reply</a>
                <a href="?del_id=<?php echo htmlspecialchars($row['l_Id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
            </div>
        </td>
    </tr>
<?php
}
?>

            </div>
        </div>
    </div>
          </div>
          <!-- content-wrapper ends -->

<?php

include("_footer.php");
?>