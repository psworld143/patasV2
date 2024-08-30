<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_id'])) {


    $event_id = $_POST['event_id'];
    $contestant = $_POST['contestant_id'];

    $user = $_SESSION['username'];

    $query = "SELECT * FROM criteria_informations WHERE event_id = '$event_id'";
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $criteria_id = $row['criteria_id'];
            $percentage = $row['percentage'];
            $score = $_POST['' . $criteria_id . ''];
            if ($score == null) {

            }
            else if($score > $percentage ){
                $_SESSION["".$criteria_id.""] = "Invalid Score provided";
            } 
            
            else {
                $query1 = "INSERT INTO scores(category,criteria_id,contestant,score,judge) VALUES('$event_id','$criteria_id','$contestant','$score','$user')";
                $result1 = mysqli_query($con, $query1);
                if ($result1) {
                    unset($_SESSION["".$criteria_id.""]);

                } else {

                }

            }

        }

    }





} else {

}
header('location: ../scores.php');
?>