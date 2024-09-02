<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['criteria_id'])) {
    $criteria_id = $_POST['criteria_id'];
    $criteria_name = $_POST['criteria_name'];
    $description = $_POST['description'];

    $query = "UPDATE criteria_archive SET criteria_name = '$criteria_name', description = '$description' WHERE id = '$criteria_id'";
    $result2 = mysqli_query($con, $query);

    if ($result2) {
    }
}

header('location: ../criteria-archive.php');
?>
