<?php
$session = session();
$user = $session->get('user');
$error = $session->get('error');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/bootstrap.min.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <title>Document</title>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          Website Example
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?php echo base_url();?>public/" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="<?php echo base_url();?>public/home/pricing" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="<?php echo base_url();?>public/home/marketplace" class="nav-link px-2 text-secondary">Marketplace</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <?php
          if ($user != NULL) {
            echo '<a href="' . base_url() . 'public/dashboard/" type="button" class="btn btn-warning">Dashboard</a>
            <a href="' . base_url() . 'public/login/logout" type="button" class="btn btn-danger">Logout</a>';
          } else {
            echo '<a href="' . base_url() . 'public/login/" type="button" class="btn btn-outline-light me-2">Login</a>
            <a href="' . base_url() . 'public/register/" type="button" class="btn btn-warning">Sign-up</a>';
          }
          ?>
            <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSM" data-bs-toggle="dropdown" aria-expanded="false">
              Carts
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButtonSM">
              <li><h6 class="dropdown-header">Carts List</h6></li>
              <?php
              if (isset($cart)) {
                foreach ($cart as $row1) {
                  echo '<li><a class="dropdown-item" href="'.base_url().'public/home/recart?id='.$row1['id'].'">'.$row1['itemname'].'</a></li>';
                }
              } else {
                echo '<li><a class="dropdown-item">You Must Login</a></li>';
              }
              
              ?>
              
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo base_url(); ?>public/checkout/cart">Checkout</a></li>
            </ul>
          
        </div>
      </div>
    </div>
  </header>
  
<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
      <form action="" class="col-6 d-flex" autocomplete="off">
        <input class="form-control form-control-dark col-6" placeholder="Search Item" name="search" autoc >
        
        <div class="col-2"></div>
        <h5 class="col-6">Total Produk <span class="badge bg-success"><?php echo count($produk);?></span></h5>
        
      </form>
      </div>
      
      <br>
    <?php
  if ($error != NULL) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    '.$error['message'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
        

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php
      
        foreach ($produk as $row) {
            echo '
            <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
              
              <div class="card-body">
                  <h5>'.$row['itemname'].' <span class="badge bg-success">Rp.'.number_format($row['itemprice']).'</span></h5>
                <p class="card-text">'.$row['itemdesc'].'</p>
                <div class="text-center">
                  <a href="'.base_url().'public/checkout?itemid='.$row['itemid'].'" type="button" class="w-50 btn btn-sm btn-success">Order</a>
                  <a href="'.base_url().'public/home/cart?itemid='.$row['itemid'].'" type="button" class="btn btn-primary btn-sm w-30">Carts</a>
                </div>
              </div>
              <div class="card-footer text-muted ">
                  By '.$row['useritem'].'
              </div>
            </div>
          </div>
            ';
        }
        ?>
      </div>

      
        
    <script src="<?php echo base_url(); ?>resource/js/bootstrap.bundle.min.js"></script>

</body>
</html>