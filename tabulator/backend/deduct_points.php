<?php
include '../includes/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $contestant_id = $_POST['contestant_id'];
   $category = $_POST['category'];
   $points_to_deduct = $_POST['points_to_deduct'];
   $reason = $_POST['reason'];

   // Update the score in the database
   $query = "UPDATE scores SET score = score - ? WHERE contestant = ? AND category = ?";
   $stmt = $con->prepare($query);
   $stmt->bind_param("iii", $points_to_deduct, $contestant_id, $category);
   
   if ($stmt->execute()) {
      // You might want to log the deduction with the reason
      $log_query = "INSERT INTO deduction_logs (contestant_id, category, points_deducted, reason, deducted_by) VALUES (?, ?, ?, ?, ?)";
      $stmt_log = $con->prepare($log_query);
      $deducted_by = $_SESSION['user_id']; // Assuming you track the user who made the deduction
      $stmt_log->bind_param("iiisi", $contestant_id, $category, $points_to_deduct, $reason, $deducted_by);
      $stmt_log->execute();

      echo "success";
   } else {
      echo "error";
   }
}
?>
