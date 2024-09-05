<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_profileID'])) {
    $id = $_POST['contestant_profileID'];
    $firstname = $_POST['contestant_profile_firstname'];
    $middlename = $_POST['contestant_profile_middlename'];
    $lastname = $_POST['contestant_profile_lastname'];
    $age = $_POST['contestant_profile_age'];
    $gender = $_POST['contestant_profile_gender'];
    $course_id = $_POST['contestant_profile_divisions']; 
    $personal_background = $_POST['contestant_profile_background'];

    $query = "UPDATE contestants SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', age = '$age',
               gender = '$gender', course = '$course_id', personal_background = '$personal_background' WHERE id = '$id'";

    $result = mysqli_query($con, $query);
    if ($result) {
    } 
}
header('location: ../contestant-profile.php');
?>
