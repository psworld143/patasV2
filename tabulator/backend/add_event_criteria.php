<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['event'])){

	$event = $_POST['event'];
    $criteria = $_POST['criteria'];
    $percentage = $_POST['percentage'];
    $user = $_SESSION['username'];
	
        $query = "SELECT * FROM criteria_informations WHERE criteria_id = '$criteria' AND event_id =  '$event' ";
        $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);

        if($rows > 0){
            
        }
        else{
            $query = "INSERT INTO criteria_informations(event_id, criteria_id, percentage, added_by) VALUES ('$event', '$criteria', '$percentage', '$user')";
            $result = mysqli_query($con,$query);
        if($result){
          header('location: ../event-criteria.php');
        }else{

        }
    }
    
}else{
    
}
header('location: ../event-criteria.php');
?>