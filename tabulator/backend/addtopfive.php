<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_GET['id'])){

	$id = $_GET['id'];
    $score = $_GET['score'];
    $user = $_SESSION['username'];
	
        $query = "SELECT * FROM topfive WHERE contestant = '$id'";
        $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);

        if($rows > 0){
            
        }
        else{
            $query = "INSERT INTO topfive(contestant, score, added_by) VALUES ('$id', '$score', '$user')";
            $result = mysqli_query($con,$query);
        if($result){
          header('location: ../print-schedule.php');
        }else{

        }
    }
    
}else{
    
}
header('location: ../print-schedule.php');
?>