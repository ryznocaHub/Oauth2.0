<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prak PWL Mg1</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/d808726940.js" crossorigin="anonymous"></script>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte.min.css">
</head>
<body class="hold-transition login-page">
<?php
session_start();
require './FacebookCek.php'; 
if (isset($_SESSION['access_token'])){
?>
    <h1 class="text-info">Selamat Datang :)</h1><br/>
    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
        <div class="card-header text-muted border-bottom-0">
            Pecandu dota
        </div>
        <div class="card-body pt-0">
            <div class="row">
            <div class="col-7">
            <?php
                try {
                    $fb->setDefaultAccessToken($_SESSION['access_token']);
                    $res = $fb->get('/me?locale=en_US&fields=name,email');
                    $user = $res->getGraphUser();?>
                    <h2 class="lead"><b><?php echo $user->getField('name'); ?></b></h2>
                    <?php
                } catch (Exception $exc) {
                    echo $exc->getTraceAsString();
                }
            ?>
                <p class="text-muted text-sm"><b>Role: </b> Support / Hard Support </p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Jl. Pembangunan jaya</li>
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone: +628 21 2345 5432 </li>
                </ul>
            </div>
            <div class="col-5 text-center">
                <!-- <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar" class="img-circle img-fluid"> -->
                <i class="fas fa-user-circle text-info img-circle img-fluid" style="font-size: 150px;"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <center><h1 class="text-info">Login Via Facebook</h1></center>
    <center><h3><a href="FacebookLogout.php">Logout</a></h3></center>
    <!-- <center><h3><a href="./logout.php">Logout</a></h3></center> -->
<?php
} else {
    echo '<script>window.location.replace("./login.php");</script>';
}
?>
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>

</body>
</html>
