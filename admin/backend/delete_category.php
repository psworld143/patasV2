<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['categoryID'])) {
    $category_id = $_POST['categoryID'];

    $query1 = "DELETE FROM event_category WHERE id = '$category_id'";
    $result1 = mysqli_query($con, $query1);
    if ($result1) {

    }

}
header('location:../category.php');
?>