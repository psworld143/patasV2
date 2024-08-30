<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['categoryID'])){
    $category_id = $_POST['categoryID'];
    $query = "UPDATE event_category SET isTabulated = 'NO'";
        $result = mysqli_query($con,$query);
        if($result){
            $query1 = "UPDATE event_category SET isTabulated = 'Ready' WHERE id = '$category_id'";
            $result1 = mysqli_query($con,$query1);
            if($result1){
            
            }
        }
}
header('location:../category.php');
?>