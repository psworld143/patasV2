<?php
include '../../includes/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $contestant_id = intval($_POST['contestant_id']);
    $category_id = intval($_POST['category']); // Added category_id
    $points_to_deduct = floatval($_POST['points_to_deduct']);
    $description = trim($_POST['description']);
    $transaction_date = date('Y-m-d H:i:s'); // Current date and time

    // Start transaction
    $con->begin_transaction();

    try {
        // Insert into deduction table
        $sql = "INSERT INTO deduction (contestant_id, category_id, deduction_points, reason, transaction_date) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("iidss", $contestant_id, $category_id, $points_to_deduct, $description, $transaction_date);
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        // Calculate total deductions for the contestant and category
        $sql = "SELECT SUM(deduction_points) AS total_deductions 
                FROM deduction 
                WHERE contestant_id = ? AND category_id = ?";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("ii", $contestant_id, $category_id);
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total_deductions = $row['total_deductions'] ?? 0;

        // Update the final_score table
        $sql = "UPDATE final_score 
                SET final_score = GREATEST(total_score - ?, 0) 
                WHERE contestant_id = ? AND category_id = ?";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("dii", $total_deductions, $contestant_id, $category_id);
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        // Commit transaction
        $con->commit();

        // Redirect on success
        header("Location: ../tabulator/print_schedule.php?status=success");
    } catch (Exception $e) {
        // Rollback transaction on error
        $con->rollback();

        // Redirect on error with the error message
        header("Location: ../../tabulator/print_schedule.php?status=error&message=" . urlencode($e->getMessage()));
    }

    $stmt->close();
    $con->close();
    exit();
} else {
    // Redirect if not a POST request
    header("Location: ../../tabulator/print_schedule.php?status=error");
    exit();
}
?>
