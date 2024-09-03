<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['course_id'])) {
    $id = $_POST['course_id'];
    $courseName = $_POST['course_name'];
    $description = $_POST['description'];

    $query = "UPDATE courses SET course_name = '$courseName', description = '$description' WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
    } 
}

header('location: ../course.php');
?>
