<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_eventID'])) {
    $ccontestant_event_id = $_POST['contestant_eventID'];

    $query = "DELETE FROM criteria_informations WHERE id = '$contestant_event_id'";
    $result = mysqli_query($con, $query);
    if ($result) {

    }

}
header('location:../event-criteria.php');
?>