<?php
include '../includes/dbcon.php';  // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $contestant_id = intval($_POST['contestant_id']);
    $category_id = intval($_POST['category']);
    $admin_id = intval($_POST['admin_id']); 
    $deduction_points = floatval($_POST['deduction_points']);
    $description = trim($_POST['description']);
    $transaction_date = date('Y-m-d H:i:s');

    // Start transaction
    $con->begin_transaction();

    try {
        // Insert into deduction table
        $sql = "INSERT INTO deduction (contestant_id, category_id, admin_id, deduction_points, description, transaction_date) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $con->error);
        }
        $stmt->bind_param("iiidss", $contestant_id, $category_id, $admin_id, $deduction_points, $description, $transaction_date);
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        $stmt->close();

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
        $stmt->close();

        // Debug: Log total deductions
        error_log("Total deductions for contestant_id $contestant_id and category_id $category_id: $total_deductions");

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
        $stmt->close();

        // Commit transaction
        $con->commit();

        // Redirect on success
        header("Location: print-schedule.php?status=success");
    } catch (Exception $e) {
        // Rollback transaction on error
        $con->rollback();

        // Redirect on error with the error message
        header("Location: print-schedule.php?status=error&message=" . urlencode($e->getMessage()));
    }

    $con->close();
    exit();
} else {
    // Redirect if not a POST request
    header("Location: print-schedule.php?status=error");
    exit();
}
?>
