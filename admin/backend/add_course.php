<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['course_name'])){

	$course_name = $_POST['course_name'];
    $description = $_POST['description'];
    $user = $_SESSION['username'];
	
        $query = "SELECT * FROM courses WHERE course_name = '$course_name'";
        $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);

        if($rows > 0){
            
        }
        else{
            $query = "INSERT INTO courses(course_name, description, added_by) VALUES ('$course_name', '$description', '$user')";
            $result = mysqli_query($con,$query);
        if($result){
          header('location: ../course.php');
        }else{

        }
    }
    
}else{
    
}
header('location: ../course.php');
?>