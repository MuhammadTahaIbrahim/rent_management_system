<?php
include("_navbar.php");
include("_sidebar.php");
?>
<?php
include("config.php");
if(isset($_POST['btnpro']))
{
    $name = $_POST['proname'];
    $desc = $_POST['prodes'];
    $price = $_POST['proprice'];
    $size = $_POST['prosize'];
    $cat = $_POST['procat'];
    $subcat = $_POST['prosub'];
    // ---------image
    $img = $_FILES['proimg']['name'];
    $imgloc = $_FILES['proimg']['tmp_name'];

    if(move_uploaded_file($imgloc, $folder="images/".$img))
    {
        $query = "INSERT INTO product(pro_name, pro_price, pro_desc, pro_size, pro_img, pro_catidfk, pro_subidfk) 
                  VALUES('".$name."', '".$price."', '".$desc."', '".$size."', '".$img."', '".$cat."', '".$subcat."')";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            echo "<script>alert('Product added Successfully')</script>";
        }
        else
        {
            echo "<script>alert('Product not added ')</script>";
        }
    }
    else
    {
        echo "<script>alert('File Not Moved')</script>";
    }
}
?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Product</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Product</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
              <div class="form-group mb-2">
                <label for="catname">Product Name :</label>
                <input type="text" class="form-control" id="proname" name="proname" placeholder="Enter product name">
              </div>
              <div class="form-group mb-2">
                <label for="exampleInputEmail1">Product price</label>
                <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Product Price" name="proprice">
              </div>
              <div class="form-group mb-2">
                <label for="exampleInputEmail1">Product description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter short Product Description" name="prodes"></textarea>
              </div>
              <div class="form-group mb-2">
                <label for="size">Select Size :</label>
                <select class="form-control" id="size" name="prosize">
                  <option value="XS">XS</option>
                  <option value="S">S</option>
                  <option value="M">M</option>
                  <option value="L">L</option>
                  <option value="XL">XL</option>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="exampleInputEmail1">Main-Category</label>
                <select id="" class="form-control form-control-lg" name="procat">
                  <?php
                  $q = "SELECT * FROM category";
                  $result = mysqli_query($conn, $q);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="exampleInputEmail1">Sub-Category</label>
                <select id="" class="form-control form-control-lg" name="prosub">
                  <?php
                  $q = "SELECT * FROM subcategory";
                  $result = mysqli_query($conn, $q);
                  while($row = mysqli_fetch_array($result))
                  {
                  ?>
                    <option value="<?php echo $row['subid'] ?>"><?php echo $row['subname'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="catimg">Product Image</label>
                <input type="file" class="form-control form-control-lg" id="proimg" name="proimg">
              </div>
              <input type="submit" value="Submit" class="btn btn-primary m-5 mt-0" name="btnpro">
            </form>
            <div class="col-md-6 text-success">
              <h4><?php echo @$message ?></h4>
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
