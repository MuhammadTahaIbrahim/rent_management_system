<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php



if(isset($_GET['del_id']))
{
    include("config.php");
    $del=$_GET['del_id'];
    $del_query="DELETE FROM city where cid='". $del."'";
    $del_res=mysqli_query($conn,$del_query);
    
    if($del_res)
    {
        echo "<script>
        alert('city deleted successfully');
        window.location.href='showcity.php';
      </script>";
    }

    else{
        echo "Error: " . mysqli_error($conn);
    }

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
              <h3 class="page-title">Show City</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">City</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show City</li>
                </ol>
              </nav>
            </div>
            <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="table-responsive">
         
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">City ID</th>
                            <th scope="col">City Name</th>
                            <th scope="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        $query = "SELECT * FROM city";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['cid'] ?></td>
                                <td><?php echo $row['cname'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="editcity.php?edit_id=<?php echo $row['cid'] ?>">Update</a>
                                        <a class="btn btn-danger" href="showcity.php?del_id=<?php echo $row['cid'] ?>">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
          </div>
          <!-- content-wrapper ends -->

        <!-- main-panel ends -->
        

<?php

include("_footer.php");
?>