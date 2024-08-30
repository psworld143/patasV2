<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['firstname'])){

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../../images/" . $filename;

	$firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $personal_background = $_POST['personal_background'];
    $entry_number = $_POST['entry_number'];
    $user = $_SESSION['username'];
	
        $query = "SELECT * FROM contestants WHERE firstname = '$firstname' AND lastname = '$lastname' AND middlename='$middlename'";
        $result = mysqli_query($con,$query) or die(mysql_error());
	    $rows = mysqli_num_rows($result);

        if($rows > 0){
            
        }
        else{
            $query = "INSERT INTO contestants(firstname, middlename, lastname, age, gender, course, personal_background, image, contestant_no, added_by)
             VALUES ('$firstname', '$middlename', '$lastname','$age','$gender','$course','$personal_background', '$filename', '$entry_number' ,'$user')";
            $result = mysqli_query($con,$query);
        if($result){
            if (move_uploaded_file($tempname, $folder)) {
                echo "<h3>  Image uploaded successfully!</h3>";
            } else {
                echo "<h3>  Failed to upload image!</h3>";
            }
        }else{

        }
    }
    
}else{
    
}
header('location: ../contestant-profile.php');
?>