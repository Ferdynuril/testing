<?php
$session = session();

$user = $session->get('user');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/bootstrap.min.css">
    <style>
        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .marketing h2 {
            font-weight: 400;
        }
        /* rtl:begin:ignore */
        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }

        .ani1 {
          animation: animation1;
          animation-duration: 5s;
        }
        @keyframes animation1 {
          50%: {position: absolute; bottom: 150px}
          100%: {position: absolute; bottom: 0px};
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
          <li><a href="" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="<?php echo base_url();?>public/home/" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="<?php echo base_url();?>public/home/pricing" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="<?php echo base_url();?>public/home/marketplace" class="nav-link px-2 text-white">Marketplace</a></li>
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
          
        </div>
      </div>
    </div>
  </header>
  
  <div class="container">
    <?php
    $error = $session->get('error');
    if ($error != NULL) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      '.$error['message'].'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    
  <section class="py-3 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-dark">Header Example</h1>
        <p class="lead text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere fugit quisquam quidem eius error aspernatur ducimus, perferendis labore eveniet ratione quod, doloribus adipisci repellendus, nulla cum inventore ut veniam. Quae?</p>
        <p>
            <div class="btn-group">
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </div>
        </p>
      </div>
    </div>
  </section>
  
  </div>
  <div class="container mb-4">
    <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 g-3">
      <div class="col">
        <div class="card p-4 bg-success text-white">
          <h4>Total User</h4>
          <div class="card-body text-end">
            <h5 id="user">0</h5>
            <script>
              let count1 = setInterval(up1)
              let i1 = 0;
              function up1() {
                let c = document.getElementById('user');
                c.innerHTML = ++i1;
                if (i1 === <?php echo count($userc) ?>) {
                  clearInterval(count1);
                }
              }
            </script>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card p-4 bg-success text-white">
          <h4>Total Item Market</h4>
          <div class="card-body text-end">
            <h5 id="item1">0</h5>
            <script>
              let count2 = setInterval(up2)
              let i2 = 0;
              function up2() {
                let c = document.getElementById('item1');
                c.innerHTML = ++i2;
                if (i2 === <?php echo count($item); ?>) {
                  clearInterval(count2);
                }
              }
            </script>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card p-4 bg-success text-white">
          <h4>Example</h4>
          <div class="card-body text-end">
            <h5 id="testc">0</h5>
            <script>
              let count3 = setInterval(up3)
              let i3 = 0;
              function up3() {
                let c = document.getElementById('testc');
                c.innerHTML = ++i3
                if (i3 === 115) {
                  clearInterval(count3);
                }
              }
            </script>
          </div>
        </div>
      </div>
  </div>
<br>
<br>
  </div>
  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  <script>


  </script>
  <script src="<?php echo base_url();?>resource/js/bootstrap.bundle.min.js"></script>
</body>
</html>