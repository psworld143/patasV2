<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['criteria_name'])){

	$criteria_name = $_POST['criteria_name'];
    $description = $_POST['description'];
    $user = $_SESSION['username'];
	
        $query = "SELECT * FROM criteria_archive WHERE criteria_name = '$criteria_name'";
        $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);

        if($rows > 0){
            
        }
        else{
            $query = "INSERT INTO criteria_archive(criteria_name, description, added_by) VALUES ('$criteria_name', '$description', '$user')";
            $result = mysqli_query($con,$query);
        if($result){
          header('location: ../criteria-archive.php');
        }else{

        }
    }
    
}else{
    
}
header('location: ../criteria-archive.php');
?>