<?php
include("_navbar.php");
include("_sidebar.php");
include("config.php");

//------------delete work
if (isset($_GET['del_id'])) {
    $del = $_GET['del_id'];
    $del_query = "DELETE FROM product WHERE pro_id='" . $del . "'";
    $del_res = mysqli_query($conn, $del_query);

    if ($del_res) {
        echo "<script>
        alert('Product deleted successfully');
        window.location.href='showpcat.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

//------------Fetch categories
$cat_query = "SELECT * FROM category";
$cat_result = mysqli_query($conn, $cat_query);

//------------Fetching subcategories
$sub_query = "SELECT * FROM subcategory";
if (isset($_GET['category']) && $_GET['category'] != '') {
    $category_filter = $_GET['category'];
    $sub_query .= " WHERE subid IN (SELECT subid FROM subcategory WHERE subid_fk = '" . $category_filter . "')";
}
$sub_result = mysqli_query($conn, $sub_query);

// Fetch data (based on filters)-------------
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$subcategory_filter = isset($_GET['subcategory']) ? $_GET['subcategory'] : '';

$query = "SELECT p.pro_id, p.pro_name, p.pro_desc, p.pro_price, p.pro_size, p.pro_img, c.cat_name, s.subname 
          FROM product p
          INNER JOIN category c ON p.pro_catidfk = c.cat_id
          INNER JOIN subcategory s ON p.pro_subidfk = s.subid";

if ($category_filter || $subcategory_filter) {
    $query .= " WHERE 1=1";
    if ($category_filter) {
        $query .= " AND p.pro_catidfk='" . $category_filter . "'";
    }
    if ($subcategory_filter) {
        $query .= " AND p.pro_subidfk='" . $subcategory_filter . "'";
    }
}

$result = mysqli_query($conn, $query);
?>
<style>
  .alert-big {
        font-size: 1.5rem;
        font-weight: bold; 
        text-align: center; 
        padding: 20px; 
    }
</style>

<!-- HTML structure continues... -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Products by Category</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product by Category</li>
                </ol>
            </nav>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <form id="filterForm" method="GET" action="showpcat.php" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="category" class="mr-2">Main-Category</label>
                        <select name="category" id="category" class="form-control" onchange="document.getElementById('filterForm').submit()">
                            <option value="">All</option>
                            <?php
                            while ($cat_row = mysqli_fetch_array($cat_result)) {
                                echo "<option value='" . $cat_row['cat_id'] . "'" . ($category_filter == $cat_row['cat_id'] ? ' selected' : '') . ">" . $cat_row['cat_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mr-2">
                        <label for="subcategory" class="mr-2">Sub-Category</label>
                        <select name="subcategory" id="subcategory" class="form-control" onchange="document.getElementById('filterForm').submit()">
                            <option value=""></option>
                            <?php
                            while ($sub_row = mysqli_fetch_array($sub_result)) {
                                echo "<option value='" . $sub_row['subid'] . "'" . ($subcategory_filter == $sub_row['subid'] ? ' selected' : '') . ">" . $sub_row['subname'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <?php
// Check if there are no products found
if (mysqli_num_rows($result) == 0) {
    echo '<div class="col-md-12">';
    echo '<div class="alert alert-warning alert-big" role="alert">No products found for the selected category.</div>';
    echo '</div>';
}
?>

        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <img src="<?php echo "images/" . $row['pro_img'] ?>" class="card-img-top img-thumbnail" alt="<?php echo $row['pro_name'] ?>" style="height: 350px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['pro_name'] ?></h5>
                            <p class="card-text"><?php echo $row['pro_desc'] ?></p>
                            <p class="card-text"><strong>Price:</strong> <?php echo $row['pro_price'] ?></p>
                            <p class="card-text"><strong>Size:</strong> <?php echo $row['pro_size'] ?></p>
                            <p class="card-text"><strong>Category:</strong> <?php echo $row['cat_name'] ?></p>
                            <p class="card-text"><strong>Sub Category:</strong> <?php echo $row['subname'] ?></p>
                            <div class="d-flex justify-content-center mt-3">
                                <a href="editpro.php?edit_id=<?php echo $row['pro_id'] ?>" class="btn btn-success mx-2">Update</a>
                                <a href="showpcat.php?del_id=<?php echo $row['pro_id'] ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
    </div>
  </div>
  <!-- content-wrapper ends -->

<!-- main-panel ends -->

<?php
include("_footer.php");
?>
