      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
              <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item nav-category">Category</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="fas fa-stream" style="color: #33c92d;"></i></span>
        <span class="menu-title">Main Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">          
          <li class="nav-item"> <a class="nav-link" href="addcat.php">Add Category</a></li>
          <li class="nav-item"> <a class="nav-link" href="showcat.php">Show Category</a></li>                
        </ul>
      </div>
    </li>
        <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="fas fa-stream" style="color: #33c92d;"></i></span>
        <span class="menu-title">Sub Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic1">
        <ul class="nav flex-column sub-menu">          
          <li class="nav-item"> <a class="nav-link" href="addsub_cat.php">Add Sub Category</a></li>
          <li class="nav-item"> <a class="nav-link" href="showsub_cat.php">Show Sub Category</a></li>                
        </ul>
      </div>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.php">Material</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
        <span class="menu-title">Forms</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="forms">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/forms/basic_elements.php">Form Elements</a></li>          
        </ul>
      </div>
    </li> -->

    <li class="nav-item nav-category">Products</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <span class="icon-bg"><i class="fab fa-product-hunt" style="color: #33c92d;"></i></span>
        <span class="menu-title">Add Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="addpro.php">Add Products</a></li>
          <li class="nav-item"> <a class="nav-link" href="showpro.php">Show Products</a></li>
          <li class="nav-item"> <a class="nav-link" href="showpcat.php">Products by Category</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item nav-category">Details</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="fas fa-shopping-cart" style="color: #33c92d;"></i></span>
        <span class="menu-title">Checkout</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic2">
        <ul class="nav flex-column sub-menu">          
          <li class="nav-item"> <a class="nav-link" href="checkout.php">Show Checkout</a></li>              
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="fab fa-first-order" style="color: #33c92d;"></i></span>
        <span class="menu-title">Orders</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic3">
        <ul class="nav flex-column sub-menu">          
          <li class="nav-item"> <a class="nav-link" href="orders.php">Show Orders</a></li>              
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="fab fa-first-order" style="color: #33c92d;"></i></span>
        <span class="menu-title">Lender</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic4">
        <ul class="nav flex-column sub-menu">          
          <li class="nav-item"> <a class="nav-link" href="lenders.php">Show lender list</a></li>              
        </ul>
      </div>
    </li>
    <li class="nav-item nav-category">User Data</li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
        <span class="menu-title">User Page</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="user.php">Show Users</a></li>   
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
        <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
        <span class="menu-title">User Contact</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="contact.php">Show Contact List</a></li>   
        </ul>
      </div>
    </li>
  </ul>
</nav>