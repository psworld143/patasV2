<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['courseID'])) {
    $course_id = $_POST['courseID'];

    $query = "DELETE FROM courses WHERE id = '$course_id'";
    $result = mysqli_query($con, $query);
    if ($result) {

    }

}
header('location:../course.php');
?>