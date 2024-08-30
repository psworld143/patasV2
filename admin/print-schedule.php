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
                  <img src="../asset/img/seait.png" class="img-circle" alt="User Image" width="40" style="margin-top: -8px;">
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
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="../asset/img/event.png" width="30">
                        <p>
                           Category
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="category.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Category</p>
                           </a>
                        </li>
                      
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="../asset/img/criteria.png" width="30">
                        <p>
                           Criteria
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="criteria-archive.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Criteria </p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="event-criteria.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Event Criteria</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="course.php" class="nav-link">
                        <img src="../asset/img/course.png" width="30">
                        <p>
                           Divisions
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="../asset/img/contestant.png" width="30">
                        <p>
                           Contestants
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="contestant-profile.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Profile</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="contestant-event.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Assign Category</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <img src="../asset/img/judges.png" width="30">
                        <p>
                           Judges
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="judge-profile.php" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Profile</p>
                           </a>
                        </li>
                      
                     </ul>
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
                        Final Results
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
                     <h1 class="m-0"><img src="../asset/img/event.png" width="40"> FInal Tally Results</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Final Results</li>
                     </ol>
                  </div>
                  <a class="btn btn-sm elevation-4" href="#" onClick="window.print();"
                     style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><img
                        src="../asset/img/print.png" width="30">
                     Print</a>
               </div>
            </div>
         </div>
         <section class="content">
         <p style="animation: right_to_left 3s ease; width: 100%;"><span style="color: red; font-size: 12px;"> Points shown in the table below are the total points accumalated from all judges from different criteria divided by number of judges.</p>
            <div class="container-fluid">
               <div class="card card-info elevation-2">
                  <br>
                  <div class="col-md-12">
                     <?php
                     
                           echo '
                          <div class="card card-info elevation-0">
                          <br>
                          <div class="col-md-12">
                             <div class="row">
                                <div class="col-lg-12">
                                   <div class="info-box bg-yellow">
                                         <span class="info-box-text">
                                            <h5><h3>Male Candidate Final Results</h3></span>      
                                   </div>
                                </div>
                              
                                <div class="col-lg-12">
                                    
                                   <table id="example1" class="table">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Candidate Name</th>';
                                          $query1 = "SELECT * FROM event_category ORDER BY order_number ASC";
                                          if ($result1 = $con->query($query1)) {
                                             while ($row1 = $result1->fetch_assoc()) {
                                                echo'
                                                      <th><center>'.$row1['category_name'].'('.$row1['percentage'].'%)</center></th>
                                                      
                                                   ';
                                             }
                                          }
                                          echo'
                                          <th><center>Total</center></th>
                                          <th><center>Rank</center></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                       ';

                                       $total_points = 0;
                                       $total_percentage = 0;
                                       $query2 = "SELECT * FROM contestants where gender = 'Male'";
                                          if ($result2 = $con->query($query2)) {
                                             while ($row2 = $result2->fetch_assoc()) {
                                                $contestant_id = $row2['id'];
                                                echo'
                                                      <td>
                                                      <span class="badge bg-green"># '.$row2['contestant_no'].'</span></td>
                                                      

                                                      
                                                   ';
                                                echo'
                                                      <td>
                                                      <i><img src="../images/'.$row2['image'].'" width="50px" height="50px" style="border-radius: 50%;"></i><b> '.$row2['firstname'].'
                                                       '.$row2['middlename'].' '.$row2['lastname'].'</b> </td>
                                                      

                                                      
                                                   ';

                                                   $querycandid = "SELECT COUNT(*) AS total_judges FROM admin_users WHERE user_type = 'judge'";
                                                   if ($resultcandid = $con->query($querycandid)) {
                                                      $rowcandid = $resultcandid->fetch_assoc();
                                                      $totaljudge= $rowcandid['total_judges'];
  
                                                   }


                                                   $query3 = "SELECT * FROM event_category ORDER BY order_number ASC";
                                                   if ($result3 = $con->query($query3)) {
                                                      while ($row3 = $result3->fetch_assoc()) {
                                                         $category = $row3['id'];
                                                         $percentage = 0;
                                                         $percentage = $row3['percentage'];
                                                         $query4 = "SELECT SUM(score) AS total_points FROM scores WHERE category = '".$category."' AND contestant = '".$contestant_id."'";
                                                         if ($result4 = $con->query($query4)) {
                                                            $row4 = $result4->fetch_assoc();
                                                            $total_points = $total_points + $row4['total_points'] / $totaljudge;
                                                            $points_gained = $row4['total_points'];
                                                            $total_p = 0;
                                                            $total_pts = ($percentage/100) * $points_gained;
                                                            $total_p = $total_pts / $totaljudge;
                                                            $total_percentage = $total_percentage + $total_p;
                                                            if($row4['total_points']==null){
                                                               echo'
                                                               <td> <center><span class="badge bg-red"> No Tabulated Score found!</span></center></td>
                                                               ';  
                                                            }
                                                            else{
                                                               echo'
                                                               <td> <center>Total of <b>'.$row4['total_points']/$totaljudge. '</b> Points  <span class="badge bg-green"> ('.$total_p.'%)</span></center></td>
                                                               ';  
                                                            }
                                                            
                                                         }

                                                      }

                                                   }

                                                   echo'<td><center><b>'.$total_points.'</b> <span class="badge bg-green">('.$total_percentage.'%)</span></center></td>';
                                                   echo'<td><center><input type="text" class="form-control"></center></td>';
                                                   $total_points = 0;
                                                   $total_percentage = 0;

                                                echo '</tr>';
                                             }
                                             
                                          }

                                       echo'
                                       
                                       
                                    </tbody>
                                   </table>
                                </div>
                             </div>
                             
                          </div>
                          <br>
                          
                        </div>
                          ';
                          echo '
                          <div class="card card-info elevation-0">
                          <br>
                          <div class="col-md-12">
                             <div class="row">
                                <div class="col-lg-12">
                                   <div class="info-box bg-yellow">
                                         <span class="info-box-text">
                                            <h5><h3>Female Candidate Final Results</h3></span>      
                                   </div>
                                </div>
                              
                                <div class="col-lg-12">
                                    
                                   <table id="example2" class="table">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Candidate Name</th>';
                                          $query1 = "SELECT * FROM event_category ORDER BY order_number ASC";
                                          if ($result1 = $con->query($query1)) {
                                             while ($row1 = $result1->fetch_assoc()) {
                                                echo'
                                                      <th><center>'.$row1['category_name'].'('.$row1['percentage'].'%)</center></th>
                                                      
                                                   ';
                                             }
                                          }
                                          echo'
                                          <th><center>Total</center></th>
                                          <th><center>Rank</center></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                       ';

                                       $total_points = 0;
                                       $total_percentage = 0;
                                       $query2 = "SELECT * FROM contestants where gender = 'Female'";
                                          if ($result2 = $con->query($query2)) {
                                             while ($row2 = $result2->fetch_assoc()) {
                                                $contestant_id = $row2['id'];
                                                echo'
                                                      <td>
                                                      <span class="badge bg-green"># '.$row2['contestant_no'].'</span></td>
                                                      

                                                      
                                                   ';
                                                echo'
                                                      <td>
                                                      <i><img src="../images/'.$row2['image'].'" width="50px" height="50px" style="border-radius: 50%;"></i><b> '.$row2['firstname'].'
                                                       '.$row2['middlename'].' '.$row2['lastname'].'</b> </td>
                                                      

                                                      
                                                   ';

                                                   $querycandid = "SELECT COUNT(*) AS total_judges FROM admin_users WHERE user_type = 'judge'";
                                                   if ($resultcandid = $con->query($querycandid)) {
                                                      $rowcandid = $resultcandid->fetch_assoc();
                                                      $totaljudge= $rowcandid['total_judges'];
  
                                                   }


                                                   $query3 = "SELECT * FROM event_category ORDER BY order_number ASC";
                                                   if ($result3 = $con->query($query3)) {
                                                      while ($row3 = $result3->fetch_assoc()) {
                                                         $category = $row3['id'];
                                                         $percentage = 0;
                                                         $percentage = $row3['percentage'];
                                                         $query4 = "SELECT SUM(score) AS total_points FROM scores WHERE category = '".$category."' AND contestant = '".$contestant_id."'";
                                                         if ($result4 = $con->query($query4)) {
                                                            $row4 = $result4->fetch_assoc();
                                                            $total_points = $total_points + $row4['total_points'] / $totaljudge;
                                                            $points_gained = $row4['total_points'];
                                                            $total_p = 0;
                                                            $total_pts = ($percentage/100) * $points_gained;
                                                            $total_p = $total_pts / $totaljudge;
                                                            $total_percentage = $total_percentage + $total_p;
                                                            if($row4['total_points']==null){
                                                               echo'
                                                               <td> <center><span class="badge bg-red"> No Tabulated Score found!</span></center></td>
                                                               ';  
                                                            }
                                                            else{
                                                               echo'
                                                               <td> <center>Total of <b>'.$row4['total_points']/$totaljudge. '</b> Points  <span class="badge bg-green"> ('.$total_p.'%)</span></center></td>
                                                               ';  
                                                            }
                                                            
                                                         }

                                                      }

                                                   }

                                                   echo'<td><center><b>'.$total_points.'</b> <span class="badge bg-green">('.$total_percentage.'%)</span></center></td>';
                                                   echo'<td><center><input type="text" class="form-control"></center></td>';
                                                   $total_points = 0;
                                                   $total_percentage = 0;

                                                echo '</tr>';
                                             }
                                             
                                          }

                                       echo'
                                       
                                       
                                    </tbody>
                                   </table>
                                </div>
                             </div>
                             
                          </div>
                          <br>
                          
                        </div>
                          ';
                      
                     ?>


                  </div>
               </div>
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
      $(function () {
         $("#example2").DataTable();
      });
   </script>
</body>

</html>