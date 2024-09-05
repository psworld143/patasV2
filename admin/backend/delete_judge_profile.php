<?php
session_start();
require('../../includes/dbcon.php');

// Handle the delete operation
if (isset($_POST['judge_profileID'])) {
    $id = $_POST['judge_profileID'];

    
    $delete_query = "DELETE FROM admin_users WHERE id = '$id'";

    $result = mysqli_query($con, $delete_query);
    if ($result) {
    } 
    header('location: ../judge-profile.php');
    exit;
}