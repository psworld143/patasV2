<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['event_criteriaID'])) {
    $event_criteria_id = $_POST['event_criteriaID'];

    $query = "DELETE FROM criteria_informations WHERE id = '$event_criteria_id'";
    $result = mysqli_query($con, $query);
    if ($result) {

    }

}
header('location:../event-criteria.php');
?>