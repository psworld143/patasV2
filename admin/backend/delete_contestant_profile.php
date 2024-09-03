<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_profileID'])) {
    $contestant_profile_id = $_POST['contestant_profileID'];

    $query = "DELETE FROM contestants WHERE id = '$contestant_profile_id'";
    $result = mysqli_query($con, $query);
    if ($result) {

    }

}
header('location:../contestant-profile.php');
?>