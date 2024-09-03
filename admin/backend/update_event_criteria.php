<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['event_criteria_id'])) {
    $event_criteria_id = $_POST['event_criteria_id'];
    $event_name = $_POST['event_name'];
    $criteria_name = $_POST['criteriaName'];
    $percentage = $_POST['percentage'];

    $query = "UPDATE criteria_informations SET event_id = '$event_name', criteria_id = '$criteria_name', percentage = '$percentage'
              WHERE id = '$event_criteria_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
    }
}

header('location: ../event-criteria.php');
?>
