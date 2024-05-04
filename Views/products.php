<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resource/css/dashboard.css">
    <title>Document</title>
    
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?php echo base_url();?>public/">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="<?php echo base_url(); ?>public/login/logout">Logout</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo base_url();?>public/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo base_url();?>public/dashboard/product">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="py-4">Product</h2>
        <a href="<?php echo base_url(); ?>public/dashboard/newproduct" class="w-25 btn btn-sm btn-success">Add New Product</a>
      </div>
      
      <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Deskripsi Produk</th>
                <th>Harga Produk</th>
                <th>Setting Produk</th>
            </tr>
        </thead>
        <tbody>   
            <?php
            $num = 0;
            foreach ($produk as $row) {
                $num += 1;
                echo '<tr>
                <th>'.$num.'</th>
                <td>'.$row['itemname'].'</td>
                <td>'.$row['itemdesc'].'</td>
                <td>Rp.'.number_format($row['itemprice']).'</td>
                <td><div class="btn-group w-100"><a href="'.base_url().'public/dashboard/editproduct?itemid='.$row['itemid'].'" class="w-50 btn btn-sm btn-primary">Edit</a><a class="w-50 btn btn-sm btn-danger" onclick="confirm'.$num.'()">Delete</a></div></td>
                <script>
                function confirm'.$num.'() {
                  if (confirm("Apakah Anda Ingin Menghapusnya?") == true) {
                    window.location.href = "'.base_url().'public/dashboard/delete?itemid='.$row['itemid'].'";
                  }
                }
                </script>
                </tr>';
            }
            ?>
        </tbody> 
        
        
      </table>
      <?php
      var_dump($produk);
      ?>
    </main>
  </div>
</div>
<script src="<?php echo base_url();?>resource/js/bootstrap.bundle.min.jss"></script>
    <script src="<?php echo base_url();?>resource/js/feather.min.js"></script>
    <script src="<?php echo base_url();?>resource/js/Chart.min.js"></script>
    <script>
        (function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
      ],
      datasets: [{
        data: [
          30,
          78,
          56,
          51,
          125,
          40,
          60
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
})()
    </script>
    
</body>
</html>