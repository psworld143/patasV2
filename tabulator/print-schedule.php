
<?php
session_start();
include '../includes/dbcon.php';
// Fetch the user ID from the session
$admin_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
?>

<?php
include '../includes/dbcon.php';

$sql = "SELECT id, category_name FROM event_category ORDER BY order_number";
$result = $con->query($sql);

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row;
}


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
               <!-- Page Header -->
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><img src="../asset/img/event.png" width="40"> Final Tally Results</h1>
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
            <p style="animation: right_to_left 3s ease; width: 100%;"><span style="color: red; font-size: 12px;"> Points shown in the table below are the total points accumulated from all judges from different criteria divided by the number of judges.</p>
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
                        echo '<th><center>'.$row1['category_name'].'('.$row1['percentage'].'%)</center></th>';
                     }
                  }
                  echo '
                  <th><center>Total</center></th>
                  <th><center>Action</center></th>
               </tr>
            </thead>
            <tbody>';
            
            $query2 = "SELECT * FROM contestants WHERE gender = 'Male'";
            if ($result2 = $con->query($query2)) {
               while ($row2 = $result2->fetch_assoc()) {
                  $contestant_id = $row2['id'];
                  echo '
                  <tr>
                     <td><span class="badge bg-green"># '.$row2['contestant_no'].'</span></td>
                     <td><i><img src="../images/'.$row2['image'].'" width="50px" height="50px" style="border-radius: 50%;"></i><b> '.$row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'].'</b></td>';

                     // Retrieve the total number of judges
                     $querycandid = "SELECT COUNT(*) AS total_judges FROM admin_users WHERE user_type = 'judge'";
                     if ($resultcandid = $con->query($querycandid)) {
                        $rowcandid = $resultcandid->fetch_assoc();
                        $totaljudge = $rowcandid['total_judges'];
                     }

                     $query3 = "
                     SELECT ec.id AS category_id, ec.percentage, 
                            COALESCE(fs.final_score, fs.total_score) AS score
                     FROM event_category ec
                     LEFT JOIN final_score fs 
                     ON ec.id = fs.category_id AND fs.contestant_id = ?
                     ORDER BY ec.order_number ASC";
                     
                     if ($stmt3 = $con->prepare($query3)) {
                        $stmt3->bind_param("i", $contestant_id);
                        $stmt3->execute();
                        $result3 = $stmt3->get_result();
                        
                        $total_points = 0;
                        $total_percentage = 0;
                        
                        while ($row3 = $result3->fetch_assoc()) {
                           $category = $row3['category_id'];
                           $percentage = $row3['percentage'];
                           $points_gained = $row3['score'];
                           $average_points = $totaljudge > 0 ? $points_gained / $totaljudge : $points_gained;
                           $total_points += $average_points;
                           $total_p = ($percentage / 100) * $average_points;
                           $total_percentage += $total_p;

                           echo '<td><center>Total of <b>'.number_format($average_points, 2).'</b> Points <span class="badge bg-green"> ('.number_format($total_p, 2).'%)</span></center></td>';
                        }

                        $stmt3->close();
                     }

                     echo '
                     <td><center><b>'.number_format($total_points, 2).'</b> <span class="badge bg-green">('.number_format($total_percentage, 2).'%)</span></center></td>';
                     echo '
                     <td><center>
                        <a href="backend/addtopfive.php?id='.$contestant_id .'&&score='.number_format($total_points, 2).'" class="btn bg-green">Add to Top 5</a>
                       <a href="#" class="btn bg-red" data-toggle="modal" data-target="#deductionsModal" data-id="'.$contestant_id.'" data-name="'.$row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'].'" data-total="'.number_format($total_points, 2).'" data-admin-id="'.$admin_id.'">Deductions</a>
                        <a href="#" class="btn bg-blue" id="showDeductionsBtn" data-id="<?php echo $contestant_id; ?>">Show Deductions</a>

                     </center></td>';
                     
                     $total_points = 0;
                     $total_percentage = 0;
                  echo '</tr>';
               }
            }
            echo '</tbody>
         </table>
      </div>
   </div>
</div>
<br>';
?>



<?php
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

                  // Fetch event categories
                  $query1 = "SELECT * FROM event_category ORDER BY order_number ASC";
                  if ($result1 = $con->query($query1)) {
                     while ($row1 = $result1->fetch_assoc()) {
                        echo '<th><center>'.$row1['category_name'].'('.$row1['percentage'].'%)</center></th>';
                     }
                  }

                  echo '
                  <th><center>Total</center></th>
                  <th><center>Action</center></th>
               </tr>
            </thead>
            <tbody>';

            // Fetch female contestants
            $query2 = "SELECT * FROM contestants WHERE gender = 'Female'";
            if ($result2 = $con->query($query2)) {
               while ($row2 = $result2->fetch_assoc()) {
                  $contestant_id = $row2['id'];
                  echo '
                  <tr>
                     <td><span class="badge bg-green"># '.$row2['contestant_no'].'</span></td>
                     <td><i><img src="../images/'.$row2['image'].'" width="50px" height="50px" style="border-radius: 50%;"></i><b> '.$row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'].'</b></td>';

                     // Retrieve the total number of judges
                     $querycandid = "SELECT COUNT(*) AS total_judges FROM admin_users WHERE user_type = 'judge'";
                     if ($resultcandid = $con->query($querycandid)) {
                        $rowcandid = $resultcandid->fetch_assoc();
                        $totaljudge = $rowcandid['total_judges'];
                     }

                     // Calculate total points and percentages
                     $total_points = 0;
                     $total_percentage = 0;

                     $query3 = "
                     SELECT ec.id AS category_id, ec.percentage, 
                            COALESCE(fs.final_score, fs.total_score) AS score
                     FROM event_category ec
                     LEFT JOIN final_score fs 
                     ON ec.id = fs.category_id AND fs.contestant_id = ?
                     ORDER BY ec.order_number ASC";

                     if ($stmt3 = $con->prepare($query3)) {
                        $stmt3->bind_param("i", $contestant_id);
                        $stmt3->execute();
                        $result3 = $stmt3->get_result();
                        
                        while ($row3 = $result3->fetch_assoc()) {
                           $category = $row3['category_id'];
                           $percentage = $row3['percentage'];
                           $points_gained = $row3['score'];
                           $average_points = $totaljudge > 0 ? $points_gained / $totaljudge : $points_gained;
                           $total_points += $average_points;
                           $total_p = ($percentage / 100) * $average_points;
                           $total_percentage += $total_p;

                           echo '<td><center>Total of <b>'.number_format($average_points, 2).'</b> Points <span class="badge bg-green"> ('.number_format($total_p, 2).'%)</span></center></td>';
                        }

                        $stmt3->close();
                     }

                     echo '
                     <td><center><b>'.number_format($total_points, 2).'</b> <span class="badge bg-green">('.number_format($total_percentage, 2).'%)</span></center></td>';
                     echo '
                     <td><center>
                        <a href="backend/addtopfive.php?id='.$contestant_id .'&&score='.number_format($total_points, 2).'" class="btn bg-green">Add to Top 5</a>
                         <a href="#" class="btn bg-red" data-toggle="modal" data-target="#deductionsModal" data-id="'.$contestant_id.'" data-name="'.$row2['firstname'].' '.$row2['middlename'].' '.$row2['lastname'].'" data-total="'.number_format($total_points, 2).'" data-admin-id="'.$admin_id.'">Deductions</a>
                     </center></td>';
                     
                     $total_points = 0;
                     $total_percentage = 0;
                  echo '</tr>';
               }
            }
            echo '</tbody>
         </table>
      </div>
   </div>
</div>
<br>';
?>

                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>

<!-- Deductions Modal -->
<div id="deductionsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deductionsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deductionsModalLabel">Deduct Points</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="deduct_points.php" method="POST">
                    <input type="hidden" name="contestant_id" id="contestant_id">
                    <input type="hidden" name="admin_id" id="admin_id"> 

                    <div class="form-group">
                        <label for="contestant_name">Contestant Name</label>
                        <input type="text" class="form-control" id="contestant_name" name="contestant_name" readonly>
                    </div>

                    <div class="form-group">      
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select a Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>">
                                    <?php echo htmlspecialchars($category['category_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">      
                        <label for="deduction_points">Points to Deduct</label>
                        <input type="number" class="form-control"  name="deduction_points" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter a description..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-danger">Deduct</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Show Deductions Modal -->
<div class="modal fade" id="showDeductionModal" tabindex="-1" aria-labelledby="showDeductionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showDeductionModalLabel">Deduction Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="deductionForm">
          <div class="mb-3">
            <label for="contestantId" class="form-label">Contestant ID</label>
            <input type="text" class="form-control" id="contestantId" readonly>
          </div>
          <div class="mb-3">
            <label for="deductionPoints" class="form-label">Deduction Points</label>
            <input type="text" class="form-control" id="deductionPoints" readonly>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" readonly></textarea>
          </div>
          <div class="mb-3">
            <label for="transactionDate" class="form-label">Transaction Date</label>
            <input type="text" class="form-control" id="transactionDate" readonly>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>








   <!-- jQuery -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="../asset/js/adminlte.min.js"></script>
   <script>
  // When the modal is shown, populate it with the data
  $('#deductionsModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var contestantId = button.data('id');
      var contestantName = button.data('name');
      var totalPoints = button.data('total');
      var adminId = button.data('admin-id'); // Admin ID from button data

      var modal = $(this);
      modal.find('#contestant_id').val(contestantId);
      modal.find('#contestant_name').val(contestantName);
      modal.find('#deduction_points').val(totalPoints);
      modal.find('#admin_id').val(adminId); // Set the admin ID in the modal
  });


</script>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>