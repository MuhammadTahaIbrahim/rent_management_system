<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php



if(isset($_GET['del_id']))
{
    include("config.php");
    $del=$_GET['del_id'];
    $del_query="DELETE FROM checkout where c_id='". $del."'";
    $del_res=mysqli_query($conn,$del_query);
    
    if($del_res)
    {
        echo "<script>
        alert('Deleted successfully');
        window.location.href='checkout.php';
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
              <h3 class="page-title">Show Checkout</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Show Checkout</li>
                </ol>
              </nav>
            </div>
            <div class="row g-4">
        <div class="col-md-12">
            <div class="table-responsive">
         
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">City</th>
                            <th scope="col">Address</th>
                            <th scope="col">Postcode</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Order Notes</th>
                            <th scope="col">Payment</th>
                            <th scope="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("config.php");
                        $query = "SELECT * FROM checkout";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['c_id'] ?></td>
                                <td><?php echo $row['c_name'] ?></td>
                                <td><?php echo $row['c_city'] ?></td>
                                <td><?php echo $row['c_address'] ?></td>
                                <td><?php echo $row['c_postcode'] ?></td>
                                <td><?php echo $row['c_phone'] ?></td>
                                <td><?php echo $row['c_email'] ?></td>
                                <td><?php echo $row['c_ordernotes'] ?></td>
                                <td><?php echo $row['c_payment'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-danger" href="checkout.php?del_id=<?php echo $row['c_id'] ?>">Delete</a>
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