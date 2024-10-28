<?php
include("_navbar.php");
include("_sidebar.php");
include("config.php");
?>
<?php

$total_orders = 0;

// Query to count total orders
$query = "SELECT COUNT(*) as total FROM orders"; 
$result = mysqli_query($conn, $query);

// Check if the query was successful and fetch the total number of orders
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_orders = $row['total'];
} else {
    // Handle query error (optional)
    echo "Error: " . mysqli_error($conn);
}
// ----------------products----------------
$total_products = 0;

// Query to count total products
$query = "SELECT COUNT(*) as total FROM product"; 
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_products = $row['total'];
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}
// --------------------------user-------------
$total_users = 0;

$query = "SELECT COUNT(*) as total FROM user";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_users = $row['total'];
} else {
    echo "Error: " . mysqli_error($conn);
}
// ------------------revenue----------
$total_revenue = 0;

// Query to sum the total revenue from orders
$query = "SELECT SUM(order_price) as total_revenue FROM orders"; 
$result = mysqli_query($conn, $query);

// Check if the query was successful and fetch the total revenue
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total_revenue = $row['total_revenue'];
} else {
    // Handle query error
    echo "Error: " . mysqli_error($conn);
}
?>
      <!-- partial -->
     
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
                  <ul class="nav nav-tabs tab-transparent" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="business-tab" data-bs-toggle="tab" href="#business-1" role="tab" aria-selected="false">Business</a>
                    </li>
                  </ul>
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                    <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body text-center">
            <h5 class="mb-2 text-dark font-weight-normal">Orders</h5>
            <h2 class="mb-4 text-dark font-weight-bold"><?php echo number_format($total_orders, 0); ?></h2>
            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent">
                <i class="fas fa-shopping-cart icon-md absolute-center text-dark"></i>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body text-center">
            <h5 class="mb-2 text-dark font-weight-normal">Total Products</h5>
            <h2 class="mb-4 text-dark font-weight-bold"><?php echo number_format($total_products); ?></h2>
            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent">
                <i class="fab fa-product-hunt icon-md absolute-center text-dark"></i>
            </div>
            <p class="mt-4 mb-0"></p>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body text-center">
            <h5 class="mb-2 text-dark font-weight-normal">Users</h5>
            <h2 class="mb-4 text-dark font-weight-bold"><?php echo number_format($total_users); ?></h2>
            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent">
                <i class="fas fa-users icon-md absolute-center text-dark"></i>
            </div>
            <p class="mt-4 mb-0"></p>
        </div>
    </div>
</div>
<div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body text-center">
            <h5 class="mb-2 text-dark font-weight-normal">Revenue</h5>
            <h2 class="mb-4 text-dark font-weight-bold"><?php echo number_format($total_revenue, 2); ?></h2>
            <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent">
                <i class="far fa-credit-card icon-md absolute-center text-dark"></i>
            </div>
            <p class="mt-4 mb-0"></p>
        </div>
    </div>
</div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                  <h4 class="card-title mb-0">Recent Activity</h4>
                                  <div class="dropdown dropdown-arrow-none">
                                    <button class="btn p-0 text-dark dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="mdi mdi-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuIconButton1">
                                      <h6 class="dropdown-header">Settings</h6>
                                      <a class="dropdown-item" href="#">Action</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-sm-4 grid-margin  grid-margin-lg-0">
                                <div class="wrapper pb-5 border-bottom">
                                  <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0 text-dark">Total Profit</p>
                                    <span class="text-success"><i class="mdi mdi-arrow-up"></i>2.95%</span>
                                  </div>
                                  <h3 class="mb-0 text-dark font-weight-bold">$ 92556</h3>
                                  <div class="chart-wrapper-height-sm">
                                    <canvas id="total-profit"></canvas>
                                  </div>
                                </div>
                                <div class="wrapper pt-5">
                                  <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0 text-dark">Expenses</p>
                                    <span class="text-success"><i class="mdi mdi-arrow-up"></i>52.95%</span>
                                  </div>
                                  <h3 class="mb-4 text-dark font-weight-bold">$ 59565</h3>
                                  <div class="chart-wrapper-height-sm">
                                    <canvas id="total-expences"></canvas>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-9 col-sm-8 grid-margin  grid-margin-lg-0">
                                <div class="ps-0 pl-lg-4 ">
                                  <div class="d-xl-flex justify-content-between align-items-center mb-2">
                                    <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                                      <h3 class="text-dark font-weight-bold me-2 mb-0">Devices sales</h3>
                                      <h5 class="mb-0">( growth 62% )</h5>
                                    </div>
                                    <div class="d-lg-flex">
                                      <p class="me-2 mb-0">Timezone:</p>
                                      <p class="text-dark font-weight-bold mb-0">GMT-0400 Eastern Delight Time</p>
                                    </div>
                                  </div>
                                  <div class="graph-custom-legend clearfix" id="device-sales-legend"></div>
                                  <canvas id="device-sales"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 grid-margin stretch-card">
                        <div class="card card-danger-gradient">
                          <div class="card-body mb-4">
                            <h4 class="card-title text-white">Account Retention</h4>
                            <canvas id="account-retension"></canvas>
                          </div>
                          <div class="card-body bg-white pt-4">
                            <div class="row pt-4">
                              <div class="col-sm-6">
                                <div class="text-center border-right border-md-0">
                                  <h4>Conversion</h4>
                                  <h1 class="text-dark font-weight-bold mb-md-3">$306</h1>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="text-center">
                                  <h4>Cancellation</h4>
                                  <h1 class="text-dark font-weight-bold">$1,520</h1>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-xl-flex justify-content-between mb-2">
                              <h4 class="card-title">Page views analytics</h4>
                              <div class="graph-custom-legend primary-dot" id="page-view-analytic-legend"></div>
                            </div>
                            <canvas id="page-view-analytic"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4 grid-margin grid-margin-lg-0 stretch-card">
                        <div class="card">
                          <div class="card-body recent-activity">
                            <h4 class="card-title">Recent Activity</h4>
                            <div class="d-flex mb-3">
                              <div>
                                <div class="activity-info bg-danger"> I </div>
                              </div>
                              <div class="activity-details">
                                <h4 class="text-dark font-weight-normal">Iva Barber</h4>
                                <p class="mb-0">added new task on trello</p>
                                <p class="text-small mb-0">05:58AM</p>
                              </div>
                            </div>
                            <div class="d-flex mb-3">
                              <div class="activity-info bg-warning"> D </div>
                              <div class="activity-details">
                                <h4 class="text-dark font-weight-normal">Dorothy Romero</h4>
                                <p class="mb-0">added new task on trello</p>
                                <p class="text-small mb-0">02:50PM</p>
                              </div>
                            </div>
                            <div class="d-flex mb-3">
                              <div class="activity-info bg-success"> R </div>
                              <div class="activity-details">
                                <h4 class="text-dark font-weight-normal">Ricardo Hawkins</h4>
                                <p class="mb-0">added new task on trello</p>
                                <p class="text-small mb-0">05:22AM</p>
                              </div>
                            </div>
                            <div class="d-flex">
                              <div class="activity-info hide-border bg-info"> N </div>
                              <div class="activity-details">
                                <h4 class="text-dark font-weight-normal">Noah Montgomery</h4>
                                <p class="mb-0">added new task on trello</p>
                                <p class="text-small mb-0">08:19PM</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 grid-margin grid-margin-lg-0 stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">My Balance</h4>
                            <div class="d-lg-flex justify-content-between align-items-center">
                              <h1 class="text-dark mb-0">$3258</h1>
                              <p class="text-success mb-0 font-weight-medium">+30.56% ($121)</p>
                            </div>
                            <p class="mb-5 pb-1">Deposit: <span class="font-weight-bold">$5430</span></p>
                            <canvas id="my-balance"></canvas>
                            <div class="border p-3 mt-2">
                              <div class="row">
                                <div class="col-sm-6 mb-4 mb-lg-0">
                                  <div class="d-lg-flex justify-content-between align-items-center">
                                    <div class="text-small text-dark">Available :</div>
                                    <span class="font-weight-bold text-dark text-small ">30.56%</span>
                                  </div>
                                  <div class="progress progress-sm mt-1">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="d-lg-flex justify-content-between align-items-center">
                                    <div class="text-small text-dark">Pending :</div>
                                    <span class="font-weight-bold text-small text-dark">69.44%</span>
                                  </div>
                                  <div class="progress progress-sm mt-1">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4 grid-margin grid-margin-lg-0 stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <div class="dotted-border p-3 mb-3">
                              <div class="row">
                                <div class="col-sm-12">
                                  <h4 class="card-title mb-1">Sales Prediction</h4>
                                </div>
                                <div class="col-sm-6">
                                  <canvas id="prediction-1"></canvas>
                                  <h3 class="font-weight-bold mt-3 text-dark">$3258</h3>
                                  <p class="text-muted mb-0">350-985 sales</p>
                                </div>
                                <div class="col-sm-6">
                                  <canvas id="prediction-2"></canvas>
                                  <h3 class="font-weight-bold mt-3 text-dark">$3258</h3>
                                  <p class="text-muted mb-0">350-985 sales</p>
                                </div>
                              </div>
                            </div>
                            <div class="dotted-border p-3">
                              <div class="row">
                                <div class="col-sm-12">
                                  <h4 class="card-title mt-4 mb-1">Stock History</h4>
                                </div>
                                <div class="col-sm-6">
                                  <canvas id="prediction-3"></canvas>
                                  <h3 class="font-weight-bold mt-3 text-dark">$3258</h3>
                                  <p class="mb-0 text-muted">350-985 sales</p>
                                </div>
                                <div class="col-sm-6">
                                  <canvas id="prediction-4"></canvas>
                                  <h3 class="font-weight-bold text-dark  mt-3">$3258</h3>
                                  <p class="mb-0 text-muted">350-985 sales</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="row g-4">
                    <div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead style="background-color: #f8f9fa; color: #343a40;">
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
                </tr>
            </thead>
            <tbody>
                <?php
                include("config.php");
                $query = "SELECT * FROM orders";
                $result = mysqli_query($conn, $query);
                $counter = 1; // Initialize a counter
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $counter++; ?></td> <!-- Display row number -->
                        <td><?php echo "DFY". $row['cid_fk'] ?></td>
                        <td><?php echo $row['order_pro'] ?></td>
                        <td><?php echo $row['order_quantity'] ?></td>
                        <td><?php echo $row['order_price'] ?></td>
                        <td><?php echo $row['order_delivery'] ?></td>
                        <td><?php echo $row['order_return'] ?></td>
                        <td><?php echo $row['order_cuser'] ?></td>
                        <td><?php echo $row['order_status'] ?></td>

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
            </div>
          </div>
          <!-- content-wrapper ends -->
           <style>
            .table thead th {
    background-color: #343a40; /* Dark background for headers */
    color: #ffffff; /* White text for headers */
    text-align: center; /* Center the text in the header */
    font-weight: bold; /* Make the text bold */
}

.table tbody td {
    vertical-align: middle; /* Align text vertically in the middle */
}

           </style>
          <?php

include("_footer.php");
?>
