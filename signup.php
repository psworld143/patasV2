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
  z-index: -1000;
    overflow: hidden;
    object-fit: fill;
    -webkit-filter: blur(1px);
    -moz-filter: blur(1px);
    -o-filter: blur(1px);
    -ms-filter: blur(1px);
    filter: blur(1px);
}
.login-box {
   background-color: orange;
   opacity: 0.9;
}
</style>
   </head>
   <body class="hold-transition login-page">
   <video autoplay muted loop id="myVideo">
            <source src="images/background.mp4" type="video/mp4">
      </video>
      <div class="login-box">
         <!-- /.login-logo -->
         <div class="card card-outline card-danger">
            <div class="card-header text-center">
               <a href="signup.php" class="brand-link">
               <img src="asset/img/seait.png" alt="DSMS Logo" width="100">
               </a>
            </div>
            <div class="card-body" >
               <form action="backend/signup.php" method="POST">
               <?php
               session_start();
                  if(isset($_SESSION['error'])){
                     echo '<div class="input-group mb-3">
                     <center><p style="color: red">'.$_SESSION['error'].'</p></center>
                  </div>';
                  unset($_SESSION['error']); 

                     }
                  else{

                  }

                  ?>
               <div class="input-group mb-3">
                     <input type="text" class="form-control" name="firstname" placeholder="Firstname">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="middlename" placeholder="Middlename">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="lastname" placeholder="Lastname">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="username" placeholder="Username">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" name="password" placeholder="Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" name="password2" placeholder="Re-Type Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-6 offset-3">
                        <button type="submit" class="btn btn-block btn-bg" style="background-color: orange;color: rgb(249, 249, 249)">Signup</button>
                        <br>
                        <p style="text-align: center;">Or</p>
                        <center><p style="text-align: center;"><a href="index.php" >Login Here</a></p></center>
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