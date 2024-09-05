<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_eventID'])) {
    $id = $_POST['contestant_eventID'];
    $firstname = $_POST['contestant_profile_firstname'];
    $middlename = $_POST['contestant_profile_middlename'];
    $lastname = $_POST['contestant_profile_lastname'];
    $category_name = $_POST['category_name']; 
    
    $query = "UPDATE contestants  SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', category_name = '$category_name'
            WHERE id = '$id'";

        $result = mysqli_query($con, $query);
        if ($result) {
        } 
    
    header('location: ../contestant-event.php');
}
?>
