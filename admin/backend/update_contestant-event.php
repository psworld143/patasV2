<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_eventID'])) {
    // Retrieve the posted data
    $id = mysqli_real_escape_string($con, $_POST['contestant_eventID']);
    $eventName = mysqli_real_escape_string($con, $_POST['eventName']);
    $contestantName = mysqli_real_escape_string($con, $_POST['contestant_name']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    
    // Split the contestant name into firstname, middlename, lastname
    $nameParts = explode(' ', $contestantName, 3);
    $firstname = isset($nameParts[0]) ? $nameParts[0] : '';
    $middlename = isset($nameParts[1]) ? $nameParts[1] : '';
    $lastname = isset($nameParts[2]) ? $nameParts[2] : '';

    // Update query
    $query = "UPDATE event_contestant 
              LEFT JOIN contestants ON contestants.id = event_contestant.contestant_id 
              SET event_contestant.event_id = '$eventName',
                  contestants.firstname = '$firstname',
                  contestants.middlename = '$middlename',
                  contestants.lastname = '$lastname',
                  event_contestant.status = '$status'
              WHERE event_contestant.id = '$id'";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check for query success and redirect
    if ($result) {
        header('Location: ../contestant-event.php');
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>
