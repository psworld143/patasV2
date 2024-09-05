<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_profile_id'])) {
    // Retrieve form data
    $contestant_id = $_POST['contestant_id'];
    $query = "UPDATE contestants SET 
                contestant_profile_name = '$firstname', 
                contestant_profile_middlename = '$middlename', 
                contestant_profile_lastname = '$lastname', 
                contestant_profile_age = '$age', 
                contestant_profile_gender = '$gender', 
                contestant_profile_divisions = '$course_id', 
                contestant_profile_background = '$personal_background' 
              WHERE id = '$contestant_id'";
    
    $result = mysqli_query($con, $query);

    // Check if the update was successful
    if ($result) {
    }
}

// Redirect back to the contestant management page
header('location: ../contestant-profile.php');
?>
