<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['criteriaID'])) {
    $criteria_id = $_POST['criteriaID'];
    $criteria_name = $_POST['criteriaName'];
    $description = $_POST['description'];

    // Update query to modify the criteria information in the database
    $query = "UPDATE criteria_table SET criteria_name = '$criteria_name', description = '$description' WHERE id = '$criteria_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // You can add any success message or logic here if needed
    } else {
        // You can add any error handling here if needed
    }
}

// Redirect to another page after the update (e.g., criteria.php)
header('location: ../criteria-archive.php');
?>
