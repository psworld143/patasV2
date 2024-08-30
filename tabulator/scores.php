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
         padding: 0.3rem !important;
      }

      td a.btn {
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
                  <img src="../asset/img/seait.png" class="img-circle" alt="User Image" width="40"
                     style="margin-top: -8px;">
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
         <a href="index.php" class="brand-link">
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


                  </li>
                  <li class="nav-item">
                     <a href="scores.php" class="nav-link">
                        <img src="../asset/img/score.png" width="30">
                        <p>
                           Scores
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="print-schedule.php" class="nav-link">
                        <img src="../asset/img/print.png" width="30">
                        <p>
                           Print Results
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
                     <h1 class="m-0"><img src="../asset/img/score.png" width="40"> Tabulation</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tabulation</li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <?php
               $total_scores = 0;

               $query = "SELECT * FROM event_category ORDER BY order_number ASC";
               if ($result = $con->query($query)) {
                  while ($row = $result->fetch_assoc()) {
                     $event_id = $row['id'];
                     echo '
                           <div class="card card-info elevation-0">
                           <br>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="info-box bg-yellow">
                                          <span class="info-box-text">
                                             <h5>Category Name: <span> ' . $row['category_name'] . '</span></h5>
                                          </span>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="row">';
                     $query1 = "SELECT * FROM contestants ORDER BY contestant_no ASC";
                     if ($result1 = $con->query($query1)) {
                        while ($row1 = $result1->fetch_assoc()) {
                           $contestant = $row1['id'];
                           echo '
                                          <div class="col-lg-6">
                                             <div class="info-box">
                                                <img src=../images/' . $row1['image'] . ' width="50px" height="50px" style="border-radius: 50%;">
                                                <h6>' . $row1['firstname'] . ' ' . $row1['middlename'] . ' ' . $row1['lastname'] . '</h6>
                                                <h6>' . $row1['gender'] . ' Candidate # ' . $row1['contestant_no'] . '</h6>';

                           echo '
                                             </div>';

                           echo '
                                             <div class="col-md-12">
                                                <div class="row">';
                           $query3 = "SELECT *  FROM admin_users WHERE user_type = 'judge'";
                           if ($result3 = $con->query($query3)) {
                              while ($row3 = $result3->fetch_assoc()) {

                                 $judge = $row3['username'];
                                 echo '
                                                            <div class="col-lg-6">
                                                               <div class="info-box">
                                                                  <table class="table">
                                                                     <tr>
                                                                        <td colspan="2"> Judge: <b class="badge bg-yellow">' . $row3['first_name'] . ' ' . $row3['middle_name'] . ' ' . $row3['last_name'] . '</b></td>
                                                                     </tr>
                                                                     <tr>
                                                                        <th>Criteria</th>
                                                                        <th>Score</th>
                                                                     </tr>';
                                 $total = 0;
                                 $query4 = "SELECT  criteria_archive.criteria_name AS criteria_name, scores.score AS score FROM scores
                                                                      LEFT JOIN criteria_archive ON criteria_archive.id = scores.criteria_id WHERE 
                                                                      (scores.contestant = '" . $contestant . "' AND scores.category = '" . $event_id . "') AND scores.judge = '" . $judge . "'";
                                 if ($result4 = $con->query($query4)) {

                                    while ($row4 = $result4->fetch_assoc()) {
                                       $total = $total + $row4['score'];

                                       echo '
                                                                           <tr>
                                                                              <td>' . $row4['criteria_name'] . '</td>
                                                                              <td><span class="badge bg-green">' . $row4['score'] . '</span></td>
                                                                           </tr>
                                                                     
                                                                           ';
                                    }
                                    echo '
                                                                        
                                                                        <tr>
                                                                           <td>Total</td>
                                                                           <td><span class="badge bg-red">' . $total . '/100</span></td>
                                                                     </tr>
                                                                        ';
                                 }
                                 echo '
                                                                  </table>
                                                                  
                                                               </div>
                                                               
                                                               
                                                               
                                                            </div>
                                                            
                                                
                                                         ';
                              }
                           }

                           echo '
                                                </div>
                                             </div>
                                             
                                             ';

                           echo '
                                          </div>
                                          ';
                        }
                     }
                     echo '
                                       </div>
                                    </div>   
                                    
                                 </div>
                              </div>
                              ';

                     echo '
                           </div>
                        </div>
                           ';
                  }
               }

               ?>

            </div>
         </section>
      </div>
   </div>
   <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-body text-center">
               <img src="../asset/img/sent.png" alt="" width="50" height="46">
               <h3>Are you sure want to delete this Divisions?</h3>
               <div class="m-t-20">
                  <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                  <button type="submit" class="btn btn-danger">Delete</button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-md">
         <div class="modal-content">
            <div class="modal-body text-center">
               <form>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-header">
                              <h5><img src="../asset/img/course.png" width="40"> Divisions Information</h5>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Divisions Name</label>
                                    <input type="text" class="form-control" placeholder="Divisions Name">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Description</label>
                                    <textarea class="form-control" placeholder="Descriptions"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                     <button type="submit" class="btn btn-save">Save Changes</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-md">
         <div class="modal-content">
            <div class="modal-body text-center">
               <form>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-header">
                              <h5><img src="../asset/img/course.png" width="40"> Divisions Information</h5>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Divisions Name</label>
                                    <input type="text" class="form-control" placeholder="Divisions Name">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Description</label>
                                    <textarea class="form-control" placeholder="Descriptions"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                     <button type="submit" class="btn btn-save">Save</button>
                  </div>
               </form>
            </div>
         </div>
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