<?php
include '../includes/dbcon.php';

if(isset($_POST['contestant_id'])) {
    $contestant_id = $_POST['contestant_id'];
    
    // Prepare the SQL query
    $query = "SELECT d.*, ec.category_name 
              FROM deduction d
              JOIN event_category ec ON d.category_id = ec.id
              WHERE d.contestant_id = ?
              ORDER BY d.transaction_date DESC";
    
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $contestant_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Points Deducted</th>
                        <th>Description</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['category_name']}</td>
                    <td>{$row['deduction_points']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['transaction_date']}</td>
                  </tr>";
        }
        
        echo "</tbody></table>";
    } else {
        echo "No deductions found for this contestant.";
    }
    
    $stmt->close();
} else {
    echo "Invalid request.";
}

$con->close();
?>