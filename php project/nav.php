<?php
   require_once('db/connection.php');
  //  print_r($_REQUEST);
?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/project.js"></script>
   <link rel="stylesheet" href="">

  

<nav class="navbar navbar-expand-lg bg-body-tertiary px-4 border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand fs-2" href="#"><sapn class="text-primary">Ecommerce</sapn></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 text-center">
        <li class="nav-item">
          <a class="nav-link active text-primary" aria-current="page" href="index.php">Home</a>
        </li>

        <?php
          if( !isset ($_SESSION['name'])):
        ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">New User</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>

        <?php
          endif;
        ?>
        
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>

        <?php
          if( isset ($_SESSION['name'])):
        ?>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout (<?php echo $_SESSION['name'] ?>)</a>
        </li>

        <?php
          if(isset($_SESSION['status']) && $_SESSION['status']==0):
        ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin panel
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="add-category.php">Add Category</a></li>
            <li><a class="dropdown-item" href="add-brand.php">Add Brand</a></li>
            <li><a class="dropdown-item" href="add-product.php">Add product</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="show_products.php">Show Product</a></li>
          </ul>
        </li>
        
        <?php
        endif;
        endif;
        ?>
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>