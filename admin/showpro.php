<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php
if(isset($_GET['del_id']))
{
    include("config.php");
    $del = $_GET['del_id'];
    $del_query = "DELETE FROM product WHERE pro_id='". $del."'";
    $del_res = mysqli_query($conn, $del_query);
    
    if($del_res)
    {
        echo "<script>
        alert('Product deleted successfully');
        window.location.href='showpro.php';
      </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<style>
  .table {
    width: 100%;
    max-width: 100%;
    overflow-x: auto;
    display: block;
    white-space: nowrap;
    table-layout: auto;
  }
  
  .table thead th,
  .table tbody td {
    white-space: normal;
    word-wrap: break-word;
  }
  
  .content-wrapper {
    padding: 15px;
    flex: 1 0 auto; /* Ensures the content takes up remaining space */
  }
  
  .footer {
    text-align: center;
    background-color: #f8f9fa;
    padding: 10px 0;
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
  }
</style>

<div class="main-panel d-flex flex-column">
  <div class="container-fluid">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">Show Product</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">Show Product</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product ID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Product Size</th>
                  <th scope="col">Main Category</th>
                  <th scope="col">Sub Category</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include("config.php");
                $query = "SELECT p.pro_id, p.pro_name, p.pro_desc, p.pro_price, p.pro_size, p.pro_img, c.cat_name, s.subname 
                FROM product p
                INNER JOIN category c ON p.pro_catidfk = c.cat_id
                INNER JOIN subcategory s ON p.pro_subidfk = s.subid
                ORDER BY p.pro_id DESC";      
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <tr>
                    <td><?php echo $row['pro_id'] ?></td>
                    <td><?php echo $row['pro_name'] ?></td>
                    <td><?php echo $row['pro_desc'] ?></td>
                    <td><?php echo $row['pro_price'] ?></td>
                    <td><?php echo $row['pro_size'] ?></td>
                    <td><?php echo $row['cat_name'] ?></td>
                    <td><?php echo $row['subname'] ?></td>
                    <td><img src="<?php echo "images/" . $row['pro_img'] ?>" alt="" width="150" height="150" class="img-thumbnail"></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-success" href="editpro.php?edit_id=<?php echo $row['pro_id'] ?>">Update</a>
                        <a class="btn btn-danger" href="showpro.php?del_id=<?php echo $row['pro_id'] ?>">Delete</a>
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
  </div>
  
            
    <?php include("_footer.php"); ?>

</div>
