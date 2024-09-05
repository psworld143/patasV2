<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['judge_profile_id'])) {
    $id = $_POST['judge_profile_id'];
    $firstname = $_POST['judge_firstname'];
    $middlename = $_POST['judge_middlename'];
    $lastname = $_POST['judge_lastname'];
    $achievement = $_POST['judge_achievement'];
    $username = $_POST['judge_username'];
    $password = $_POST['judge_password'];

    $query = "UPDATE admin_users SET 
                first_name = '$firstname', 
                middle_name = '$middlename', 
                last_name = '$lastname', 
                achievement = '$achievement', 
                username = '$username', 
                password = '$password'
            WHERE id = '$id'";

    $result = mysqli_query($con, $query);

    if ($result) {
        
    } 
    header('Location: ../judge-profile.php');
}

?>
