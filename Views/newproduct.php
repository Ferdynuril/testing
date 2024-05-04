<?php
$session = session();

$error = $session->get('error');


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }
        .form-input {
        width: 100%;
        max-width: 550px;
        padding: 15px;
        margin: auto;
        }
    </style>
</head>
<body>
<main class="form-input">
    <div class="container">
    
        <div class="py-4 text-center">
        <?php
  if ($error != NULL) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    '.$error['message'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
            <h4 class="mb-3">Input New Product</h4>
            <form action="prosespro" method="post" autocomplete="off">
                <div class="form-floating">
                    <input type="text" name="itemname" class="form-control" id="floatingInput1">
                    <label for="floatingInput1">Nama Produk</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="itemdesc" class="form-control" id="floatingInput2">
                    <label for="floatingInput2">Deskripsi Produk (Optional)</label>
                </div>
                <div class="form-floating">
                    <input type="number" name="itemprice" class="form-control" id="floatingInput3" oninput="harga()">
                    <label for="floatingInput3">Harga Produk (Contoh : 15000)</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="useritem" class="form-control" id="floatingInput4" disabled value="<?php echo $useritem; ?>">
                    <label for="floatingInput3">Username</label>
                </div>
                <div class="form-floating">
                    <input type="number" name="userid" class="form-control" id="floatingInput5" disabled value="<?php echo $userid;?>">
                    <label for="floatingInput3">User ID</label>
                </div>
                <br>
                <button class="w-50 btn btn-lg btn-primary" type="submit">Submit</button>
                <br>
                <br>
                <a href="<?php echo base_url();?>public/" class="w-25 btn btn-sm btn-danger">Home</a>
    <a href="<?php echo base_url();?>public/dashboard/"class="w-25 btn btn-sm btn-success">Dashboard</a>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo base_url();?>resource/js/bootstrap.bundle.min.js"></script>
</body>
</html>