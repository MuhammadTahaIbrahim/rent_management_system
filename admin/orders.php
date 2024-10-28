<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php



if(isset($_GET['del_id']))
{
    include("config.php");
    $del=$_GET['del_id'];
    $del_query="DELETE FROM orders where order_id='". $del."'";
    $del_res=mysqli_query($conn,$del_query);
    
    if($del_res)
    {
        echo "<script>
        alert('order deleted successfully');
        window.location.href='orders.php';
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
              <h3 class="page-title">Show Orders</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Orders</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show Orders</li>
                </ol>
              </nav>
            </div>
            <div class="row g-4">
        <div class="col-md-12">
            <div class="table-responsive">
         
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delivery</th>
                            <th scope="col">Return</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Status</th>
                            <th scope="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        $query = "SELECT * FROM orders";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['order_id'] ?></td>
                                <td><?php echo "DFY". $row['cid_fk'] ?></td>
                                <td><?php echo $row['order_pro'] ?></td>
                                <td><?php echo $row['order_quantity'] ?></td>
                                <td><?php echo $row['order_price'] ?></td>
                                <td><?php echo $row['order_delivery'] ?></td>
                                <td><?php echo $row['order_return'] ?></td>
                                <td><?php echo $row['order_cuser'] ?></td>
                                <td><?php echo $row['order_status'] ?></td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-success" href="editord.php?edit_id=<?php echo $row['order_id'] ?>">Update</a>
                                        <a class="btn btn-danger" href="orders.php?del_id=<?php echo $row['order_id'] ?>">Delete</a>
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