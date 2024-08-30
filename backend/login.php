<?php
require('../includes/dbcon.php');

session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_POST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
        $query = "SELECT * FROM `admin_users` WHERE username='$username'
and password='$password'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	$row = $result->fetch_assoc();
        if($rows > 0){

			$usertype = $row['user_type'];
			if($usertype == 'admin'){
				$_SESSION['username'] = $username;
	    		header("Location: ../admin");
			}
			else if($usertype == 'judge'){
				$_SESSION['username'] = $username;
	    		header("Location: ../judge");
			}
			else{
				$_SESSION['username'] = $username;
	    		header("Location: ../tabulator");
			}
         }else{
         $_SESSION['error'] ="Invalid Username or Password!";
         header("location: ../index.php");
	    }
    }else{
    }
?>