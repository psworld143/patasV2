<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['event'])){

	$event = $_POST['event'];
    $contestant = $_POST['contestant'];
    $status = $_POST['status'];
    $user = $_SESSION['username'];
	
        $query = "SELECT * FROM event_contestant WHERE event_id = '$event' AND contestant_id = '$contestant'";
        $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);

        if($rows > 0){
            
        }
        else{
            $query = "INSERT INTO event_contestant(event_id, contestant_id, status, added_by) VALUES ('$event', '$contestant','status', '$user')";
            $result = mysqli_query($con,$query);
        if($result){
          header('location: ../contestant-event.php');
        }else{

        }
    }
    
}else{
    
}
header('location: ../contestant-event.php');
?>