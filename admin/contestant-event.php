<?php
    include '../includes/dbcon.php';
    session_start();
?>
<?php
include '../includes/dbcon.php';
$current_judge = $_SESSION['username'];
$query = "SELECT * FROM admin_users WHERE username = '$current_judge'";
if ($result = $con->query($query)) {
   $row = $result->fetch_assoc();
   $firstname = $row['first_name'];
   $usertype = $row['user_type'];
   if($usertype!='admin'){
      header('location: ../index.php');
   }
   else{

   }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Tabulation-System</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">   
   <style type="text/css">
      table tr td {
         padding: 0.3rem !important;
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
                              <p>Criteria</p>
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
                     <h1 class="m-0"><img src="../asset/img/contestant.png" width="40"> Setup Event Contestant  </h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setup Event</li>
                     </ol>
                  </div>
                  <a class="btn btn-sm elevation-4" href="#" data-toggle="modal" data-target="#add"
                     style="margin-top: 20px;margin-left: 10px;background-color: rgb(240,158,65)"><i
                        class="fa fa-plus-square"></i>
                     Add New</a>
               </div>
            </div>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="card card-info elevation-2">
                  <br>
                  <div class="col-md-12">
                     <table id="example1" class="table">
                        <thead class="btn-cancel">
                           <tr>
                              <th>Event Name</th>
                              <th>Contestant Name</th>
                              <th>Status</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $query = "SELECT event_contestant.id AS id, event_category.category_name, contestants.id AS contestant_id, contestants.firstname, contestants.middlename, contestants.lastname, contestants.image 
                                       FROM event_contestant 
                                       LEFT JOIN contestants ON contestants.id = event_contestant.contestant_id 
                                       LEFT JOIN event_category ON event_category.id = event_contestant.event_id";

                              if ($result = $con->query($query)) {
                                 while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <tr>
                                          <td>'.$row['category_name'].'</td>
                                          <td><img src="../images/' . $row['image'] . '" style="width: 20px; height: 20px; border-radius: 50%;"> ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . '</td>
                                          <td><span class="badge bg-success">ready</span></td>
                                          <td class="text-center">
                                             <a class="btn btn-sm btn-success open-EditDialog" href="#" 
                                                data-id="'.$row['id'].'" 
                                                data-category_name="'.$row['category_name'].'" 
                                                data-contestant_name="'.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'">
                                                <i class="fa fa-edit"></i> Update
                                             </a>
                                             <a class="btn btn-sm btn-danger open-DeleteDialog" href="#" 
                                                data-id="'.$row['id'].'">
                                                <i class="fa fa-trash-alt"></i> Delete
                                             </a>
                                          </td>
                                    </tr>
                                    ';
                                 }
                              }
                           ?>
                        </tbody>
                     </table>
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
                   <form action="backend/delete_contestant_event.php" method="POST">
                     <div class="modal-body">
                        <input type="hidden" name="contestant_eventID" id="contestant_eventID">
                     </div>
                     <a href="#" class="btn btn-danger" data-dismiss="modal">No</a>
                     <button type="submit" class="btn btn-success">Yes</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body text-center">
                <form action="backend/update_contestant-event.php" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <h5><img src="../asset/img/event.png" width="40"> Event Information</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Event Name</label>
                                            <select class="form-control" id="edit_eventName" name="eventName">
                                                <?php
                                                $query = "SELECT id, category_name FROM event_category";
                                                if ($result = $con->query($query)) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['category_name'] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Contestant Name</label>
                                            <input type="text" class="form-control" name="contestant_name" id="edit_contestant_name" placeholder="Contestant Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="float-left">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="Open">Open</option>
                                                <option value="Close">Close</option>
                                            </select>
                                        </div>
                                        <input type="hidden" id="edit_contestant_eventID" name="contestant_eventID">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
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
               <form action="backend/add_contestant_event.php" method="POST">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-header">
                              <h5><img src="../asset/img/event.png" width="40"> Event Information</h5>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Event Name</label>
                                    <select class="form-control" name="event">
                                       <?php
                                       $query = "SELECT * FROM event_category";
                                       if($result = $con->query($query)){
                                          while($row = $result->fetch_assoc()){
                                             echo '<option value="'.$row['id'].'"> '.$row['category_name'].'</option>';
                                          }
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="float-left">Contestant Name</label>
                                    <select class="form-control" name="contestant">
                                       <?php
                                       $query = "SELECT * FROM contestants";
                                       if($result = $con->query($query)){
                                          while($row = $result->fetch_assoc()){
                                             echo '<option value="'.$row['id'].'">'.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'</option>';
                                          }
                                       }
                                       ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                 <label class="float-left">Status</label>
                                 <select class="form-control" name="status">
                                    <option value="ready" >Ready</option>
                                    <option value="not ready">Not Ready</option>
                                 </select>
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
    $(document).on("click", ".open-EditDialog", function() {
        var eventName = $(this).data('category_name');
        var contestantName = $(this).data('contestant_name');
        var id = $(this).data('id');
      
        $("#edit_eventName").val(eventName);
        $("#edit_contestant_name").val(contestantName);
        $("#edit_contestant_eventID").val(id);

        $('#edit').modal('show');
    });

    $(document).on("click", ".open-DeleteDialog", function () {
        var contestant_eventID = $(this).data('id');
        $("#contestant_eventID").val(contestant_eventID);
        $('#delete').modal('show');
    });

    $("#example1").DataTable();
});


   </script>
</body>

</html>