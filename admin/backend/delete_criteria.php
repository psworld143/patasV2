<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['criteriaID'])) {
    $criteria_id = $_POST['criteriaID'];

    $query = "DELETE FROM criteria_archive WHERE id = '$criteria_id'";
    $result = mysqli_query($con, $query);
    if ($result) {

    }

}
header('location:../criteria-archive.php');
?>