<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php



if(isset($_GET['del_id']))
{
    include("config.php");
    $del=$_GET['del_id'];
    $del_query="DELETE FROM category where cat_id='". $del."'";
    $del_res=mysqli_query($conn,$del_query);
    
    if($del_res)
    {
        echo "<script>
        alert('Category deleted successfully');
        window.location.href='showcat.php';
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
              <h3 class="page-title">Show Category</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show Category</li>
                </ol>
              </nav>
            </div>
            <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="table-responsive">
         
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Category ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Image</th>
                            <th scope="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        $query = "SELECT * FROM category";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['cat_id'] ?></td>
                                <td><?php echo $row['cat_name'] ?></td>
                                <td><img src="<?php echo "images/" . $row['cat_img'] ?>" alt="" width="150" height="150" class="img-thumbnail"></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="editcat.php?edit_id=<?php echo $row['cat_id'] ?>">Update</a>
                                        <a class="btn btn-danger" href="showcat.php?del_id=<?php echo $row['cat_id'] ?>">Delete</a>
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