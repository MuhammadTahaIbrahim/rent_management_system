<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php



if(isset($_GET['del_id']))
{
    include("config.php");
    $del=$_GET['del_id'];
    $del_query="DELETE FROM user where user_id='". $del."'";
    $del_res=mysqli_query($conn,$del_query);
    
    if($del_res)
    {
        echo "<script>
        alert('order deleted successfully');
        window.location.href='user.php';
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
              <h3 class="page-title">Show Users</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show Users</li>
                </ol>
              </nav>
            </div>
            <div class="row g-4">
        <div class="col-md-12">
            <div class="table-responsive">
         
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        $query = "SELECT * FROM user";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['user_id'] ?></td>
                                <td><?php echo $row['user_name'] ?></td>
                                <td><?php echo $row['user_email'] ?></td>
                                <td><?php echo $row['user_pass'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-danger" href="user.php?del_id=<?php echo $row['user_id'] ?>">Delete</a>
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