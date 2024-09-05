<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_eventID'])) {
    $id = $_POST['contestant_eventID'];

    $query = "DELETE FROM event_contestant WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
    }
}

header('Location: ../contestant-event.php');
?>
