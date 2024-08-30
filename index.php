<?php 
include 'includes/dbcon.php';
session_start();
?>
<!DOCTYPE html>


<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pageant Tabulation System-PaTaS</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="asset/css/adminlte.min.css">
      <style>
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}
.login-box {
   background-color: orange;
   opacity: 0.9;
}
</style>
   </head>
   <body class="hold-transition login-page" >
      <video autoplay muted loop id="myVideo">
            <source src="images/background.mp4" type="video/mp4">
      </video>
      <div class="login-box">
         <!-- /.login-logo -->
         <div class="card card-outline card-danger">
            <div class="card-header text-center">
               <a href="index.php" class="brand-link">
               <img src="asset/img/seait.png" alt="PATAS Logo" width="200">
               </a>
            </div>
            <div class="card-body" >
               <form action="backend/login.php" method="post">
                  <?php
                  if(isset($_SESSION['error'])){
                     echo '
                           <center><p style="color: red">'.$_SESSION['error'].'</p></center>
                        ';
                        unset($_SESSION['error']); 

                     }
                  else{

                  }

                  ?>
                  <div class="input-group mb-3">
                     <input type="text" name="username" class="form-control" placeholder="Username">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" name="password" class="form-control" placeholder="Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6 offset-3">
                        <button type="submit" class="btn btn-block btn-bg" style="background-color: orange;color: rgb(249, 249, 249); width: 100%;">Login</button>
                        <br>
                        <p style="text-align: center;">Or</p>
                        <center><p> <span> <a href="signup.php" >Judge Registration</a></span></p></center>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
   </body>
</html>