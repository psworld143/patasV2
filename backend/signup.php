<?php
require('../includes/dbcon.php');

session_start();
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $password2 = $_POST['password2'];
    $query = "SELECT * FROM `admin_users` WHERE (username = '$username' and first_name = '$firstname') AND last_name = '$lastname'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	$row = $result->fetch_assoc();
        if($rows > 0){
            $_SESSION['error'] = "You are already registered to the System!";
	    	header("Location: ../index.php");
			
         }else{
            if($password != $password2){
                $_SESSION['error'] = "Please Make sure that you have re-type your password!";
                header("Location: ../signup.php");
            }
            else{
                $query1 = "INSERT INTO admin_users(first_name, middle_name, last_name, username, password, user_type)
                VALUES ('$firstname', '$middlename', '$lastname', '$username', '$password','judge')";
                $result1 = mysqli_query($con,$query1);
                if($result1){
                    $_SESSION['username'] = $username;
                    header("location: ../judge");
                }

            }
         
	    }
    }else{

    }
?>