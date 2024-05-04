<?php
$session = session();
$error = $session->get('error');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>resource/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
</head>
<body class="text-center">
  
<main class="form-signin">
  <?php
  if ($error != NULL) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    '.$error['message'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>

  <form action="<?php echo base_url(); ?>public/register/proses" method="post" autocomplete="off" >

    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input name="password1" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
      <input name="password2" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Confirm Password</label>
    </div>
    <br>


    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
    <br>
    <br>
    <a href="<?php echo base_url();?>public/" class="w-25 btn btn-sm btn-danger">Home</a>
    <a href="<?php echo base_url();?>public/login/"class="w-25 btn btn-sm btn-success">Login</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
    
    <script src="<?php echo base_url();?>resource/js/bootstrap.bundle.min.js"></script>
</body>
</html>