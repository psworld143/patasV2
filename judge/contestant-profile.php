<?php
include '../includes/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pageant Tabulation System-PaTaS</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">
      <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
      <style type="text/css">
         table tr td {
         padding: 0.1rem !important;
         }
         td a.btn{
         font-size: 0.7rem;
         }
      </style>
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(240,158,65)">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
               <li class="nav-item">
               <p style="font-size: 24px; color: white;">Pageant Tabulation System-PaTaS</p>
            </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="#" role="button">
                  <img src="../asset/img/avatar.png" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="../logout.php">
                  <i class="fas fa-sign-out-alt"></i>
                  </a>
               </li>
            </ul>
         </nav>
         <aside class="main-sidebar sidebar-light-primary" style="background-color: rgb(46,18,35);">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link">
            <img src="../asset/img/seait.png" alt="DSMS Logo" width="200">
            </a>
            <div class="sidebar">
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                     data-accordion="false">
                     <li class="nav-item">
                        <a href="index.php" class="nav-link">
                           <img src="../asset/img/dashboard.png" width="30">
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="contestant-profile.php" class="nav-link">
                           <img src="../asset/img/contestant.png" width="30">
                           <p>
                              Contestants
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="scores.php" class="nav-link">
                           <img src="../asset/img/score.png" width="30">
                           <p>
                              Score Sheets
                           </p>
                        </a>
                     </li>
                     <li class="nav-item">
                     <a href="scores_top_five.php" class="nav-link">
                        <img src="../asset/img/score.png" width="30">
                        <p>
                           Top 5 Finalist
                        </p>
                     </a>
                  </li>
                     <li class="nav-item">
                     <a href="yourscores.php" class="nav-link">
                        <img src="../asset/img/score.png" width="30">
                        <p>
                          Your Scorings
                        </p>
                     </a>
                  </li>
                  </ul>
               </nav>
            </div>
         </aside>
         <div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0"><img src="../asset/img/contestant.png" width="40"> Contestants</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Contestants</li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info elevation-2">
                     <br>
                     <div class="col-md-12">
                        <div class="row">
                           <?php
                            $query = "SELECT * FROM contestants LEFT JOIN courses ON contestants.course = courses.id";
                            if($result = $con->query($query)){
                               while($row = $result->fetch_assoc()){
                                 echo '
                                 <div class="col-lg-2">
                                 <div class="info-box">
                                    <a href="../images/'.$row['image'].'" target="_blank"><img src="../images/'.$row['image'].'" width="100%" style="border-radius: 50%; border: 2px solid #555;"></a>
                                   
                                 </div>
                                
                              </div>
                              <div class="col-lg-4">
                                 <div class="info-box">
                                    <table class="table table-bordered">
                                       <tbody>
                                          <tr>
                                            
                                                <td colspan="2"> <span class="badge bg-yellow" style="height: 30px; padding: 8px;"> '.$row['gender'].' Candidate '.$row['contestant_no'].'</span></td>
                                             
                                          </tr>
                                          <tr>
                                             <td><p>Full Name: </p></td>
                                             <td><p>'.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'</p></td>
                                          </tr>
                                          <tr>
                                             <td><p>Gender: </p></td>
                                             <td><p>'.$row['gender'].'</p></td>
                                          </tr>
                                          <tr>
                                             <td><p>Age: </p></td>
                                             <td><p>'.$row['age'].' </p></td>
                                          </tr>
                                          <tr>
                                             <td><p>Representing: </p></td>
                                             <td><p>'.$row['course_name'].'</p></td>
                                          </tr>
                                          <tr>
                                             <td><p>Background </p></td>
                                             <td><p>'.$row['personal_background'].'</p></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                                 ';

                               }
                              }

                           ?>
                          
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script>
         $(function () {
            $("#example1").DataTable();
         });
      </script>
   </body>
</html>