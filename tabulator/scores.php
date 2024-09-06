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
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item">
                     <a href="index.php" class="nav-link">
                        <img src="../asset/img/dashboard.png" width="30">
                        <p>Dashboard</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="scores.php" class="nav-link">
                        <img src="../asset/img/score.png" width="30">
                        <p>Scores</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="print-schedule.php" class="nav-link">
                        <img src="../asset/img/print.png" width="30">
                        <p>Print Results</p>
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
// Fetch event categories
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
        
        // Fetch contestants
        $query1 = "SELECT * FROM contestants ORDER BY contestant_no ASC";
        if ($result1 = $con->query($query1)) {
            while ($row1 = $result1->fetch_assoc()) {
                $contestant_id = $row1['id'];
                echo '
                    <div class="col-lg-6">
                        <div class="info-box">
                            <img src=../images/' . $row1['image'] . ' width="50px" height="50px" style="border-radius: 50%;">
                            <h6>' . $row1['firstname'] . ' ' . $row1['middlename'] . ' ' . $row1['lastname'] . '</h6>
                            <h6>' . $row1['gender'] . ' Candidate # ' . $row1['contestant_no'] . '</h6>
                        </div>
                        <div class="col-md-12">
                            <div class="row">';
                
                // Fetch judges
                $query3 = "SELECT * FROM admin_users WHERE user_type = 'judge'";
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

                        // Query to get detailed scores by criteria for each judge
                        $query4 = "
                            SELECT 
                                c.criteria_name AS criteria_name,
                                SUM(s.score) AS score
                            FROM scores s
                            LEFT JOIN criteria_archive c ON c.id = s.criteria_id
                            WHERE s.contestant = '$contestant_id'
                                AND s.category = '$event_id'
                                AND s.judge = '$judge'
                            GROUP BY c.criteria_name
                        ";

                        if ($result4 = $con->query($query4)) {
                            $total_score = 0; // Initialize total score before fetching it
                            while ($row4 = $result4->fetch_assoc()) {
                                $total_score += $row4['score']; // Add up all the scores per criteria
                                echo '
                                    <tr>
                                        <td>' . $row4['criteria_name'] . '</td>
                                        <td><span class="badge bg-green">' . $row4['score'] . '</span></td>
                                    </tr>
                                ';
                            }
                        }

                        // Query to get deductions specific to each judge
                        $query5 = "
                            SELECT 
                                d.description AS deduction_description,
                                COALESCE(SUM(d.deduction_points), 0) AS total_deduction
                            FROM deduction d
                            WHERE d.contestant_id = '$contestant_id'
                                AND d.category_id = '$event_id'
                                AND d.admin_id = (SELECT id FROM admin_users WHERE username = '$judge')
                            GROUP BY d.description
                        ";
                        
                        // Fetch and calculate deductions for the current judge
                        if ($result5 = $con->query($query5)) {
                            $total_deduction = 0;
                            while ($row5 = $result5->fetch_assoc()) {
                                $total_deduction += $row5['total_deduction']; // Sum of all deductions for this contestant, event, and judge
                                
                                // Display deductions
                                echo '
                                  <tr>
                                     <td><strong>Total Score (before deductions):</strong></td>
                                     <td><span class="badge bg-blue">' . $total_score . '</span></td>
                                  </tr>

                                  <!-- Centered Deductions row spanning two columns -->
                                  <tr>
                                     <td colspan="2" style="text-align: center;"><strong>Deductions</strong></td>
                                  </tr>

                                  <tr>
                                     <td>Deduction Description:</td>
                                     <td><span class="badge bg-yellow">' . $row5['deduction_description'] . '</span></td>
                                  </tr>
                                  <tr>
                                     <td>Total Deductions:</td>
                                     <td><span class="badge bg-red">' . $total_deduction . '</span></td>
                                  </tr>
                                ';
                            }
                        }
                        
                        // Calculate adjusted score
                        $adjusted_score = $total_score - $total_deduction;
                        if ($adjusted_score < 0) {
                            $adjusted_score = 0; // Ensure score doesn't go below 0
                        }
                        
                        // Display total and adjusted scores
                        echo '
                            <tr>
                               <td><strong>Final Score (after deductions):</strong></td>
                               <td><span class="badge bg-blue">' . $adjusted_score . '/' . $total_score . '</span></td>
                            </tr>
                        </table>
                                </div>
                            </div>';
                    }
                }
                echo '
                            </div>
                        </div>
                    </div>';
            }
        }
        echo '
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}
?>



            </div>
         </section>
      </div>
   </div>
   <!-- REQUIRED SCRIPTS -->
   <script src="../asset/js/jquery.min.js"></script>
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
   <script src="../asset/js/adminlte.min.js"></script>
   <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
   <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="../asset/tables/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="../asset/tables/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="../asset/tables/datatables-buttons/js/buttons.print.min.js"></script>
</body>

</html>
