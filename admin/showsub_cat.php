<?php
include("_navbar.php");
include("_sidebar.php");
?>
<style>

.table {
    width: 100%;
    overflow-x: auto; 
}

/* Ensure images are responsive */
.TBLIMAGE {
    max-width: 100%;
    height: auto;
}

/* Bootstrap classes are used for buttons, adjust styles if needed */

</style>
<?php



if(isset($_GET['del_id']))
{
    include("config.php");
    $del=$_GET['del_id'];
    $del_query="DELETE FROM subcategory where subid='". $del."'";
    $del_res=mysqli_query($conn,$del_query);
    
    if($del_res)
    {
        echo "<script>
        alert('sub Category deleted successfully');
        window.location.href='showsub_cat.php';
      </script>";
    }

    else{
      echo "Error: " . mysqli_error($conn);
    }

}


?>
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
                            <th scope="col">Sub-Category ID</th>
                            <th scope="col">Sub-Category Name</th>
                            <th scope="col">Main-Category Name</th>
                            <th scope="col">Sub-Category Image</th>
                            <th scope="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
 <?php
 include("config.php");
 $query = "SELECT s.subid, s.subname, s.subimg, c.cat_name  
 FROM subcategory s
 INNER JOIN category c ON s.subid_fk = c.cat_id
 ORDER BY s.subid ASC";
                             $result=mysqli_query($conn,$query);
                            while($row= mysqli_fetch_array($result))
                             {
                        ?>
                            <tr>
                                <td><?php echo $row['subid'] ?></td>
                                <td><?php echo $row['subname'] ?></td>
                                 <td><?php echo $row['cat_name'] ?></td>
                                <td><img src="<?php echo "images/" . $row['subimg'] ?>" alt="" width="100" height="100" class="TBLIMAGE"></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="editsub_cat.php?edit_id=<?php echo $row['subid'] ?>">Update</a>
                                        <a class="btn btn-danger" href="showsub_cat.php?del_id=<?php echo $row['subid'] ?>">Delete</a>
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