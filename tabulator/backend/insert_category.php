<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['category_name'])){

	$category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $user = $_SESSION['username'];
    $order = $_POST['order'];
    $percentage = $_POST['percentage'];
	
        $query = "SELECT * FROM event_category WHERE category_name = '$category_name'";
        $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);

        if($rows == 1){
            
        }
        else{
            $query = "INSERT INTO event_category(category_name, description, added_by, order_number, percentage) VALUES ('$category_name', '$description', '$user', '$order', '$percentage')";
            $result = mysqli_query($con,$query);
        if($result){
          header('location: ../category.php');
        }else{

        }
    }
    
}else{
    
}
?>