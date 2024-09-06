<?php
   session_start();
   require('../../includes/dbcon.php');

   if(isset($_POST['submit'])) {
      $first_name =$_POST['first_name'];
      $middle_name =$_POST['middle_name'];
      $last_name =$_POST['last_name'];
      $username =$_POST['username'];
      $password =$_POST['password'];
      $achievement =$_POST['achievement'];
      $usertype =$_POST['usertype']; 

      $query = "INSERT INTO admin_users (first_name, middle_name, last_name, username, password, achievement, user_type)
         VALUES ('$first_name', '$middle_name', '$last_name', '$username', '$password', '$achievement', '$usertype')";

      $result = mysqli_query($con,$query);
      if($result){
      } 
   }
   header('location:../judge-profile.php');
?>
