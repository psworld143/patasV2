<?php
// backend/update_contestant_event.php

include '../includes/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contestant_eventID = $_POST['contestant_eventID'];
    $event_name = $_POST['event_name'];
    $contestant_name = $_POST['contestant_name'];
    $status = $_POST['status'];

    // Update query
    $query = "UPDATE event_contestant SET event_id = ?, contestant_id = ?, status = ? WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('iisi', $event_name, $contestant_name, $status, $contestant_eventID);

    if ($stmt->execute()) {
        header('Location: ../path/to/your/page.php');
    } else {
        echo "Error updating record: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>
