<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_id'])) {

    $event_id = $_POST['event_id'];
    $contestant = $_POST['contestant_id'];
    $user = $_SESSION['username'];

    // Prepare to calculate total score
    $total_score = 0;

    $query = "SELECT * FROM criteria_informations WHERE event_id = '$event_id'";
    if ($result = $con->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $criteria_id = $row['criteria_id'];
            $percentage = $row['percentage'];
            $score = $_POST['' . $criteria_id . ''];

            if ($score === null) {
                continue;
            } elseif ($score > $percentage) {
                $_SESSION["" . $criteria_id . ""] = "Invalid Score provided";
            } else {
                // Insert score into the scores table
                $query1 = "INSERT INTO scores (category, criteria_id, contestant, score, judge) 
                           VALUES ('$event_id', '$criteria_id', '$contestant', '$score', '$user')";
                $result1 = mysqli_query($con, $query1);
                
                if ($result1) {
                    unset($_SESSION["" . $criteria_id . ""]);
                    
                    // Add score to total score
                    $total_score += $score;
                } else {
                    // Handle insert failure if needed
                }
            }
        }
    }

    // Update final_score table with total score
    if ($total_score > 0) {
        // Check if an entry already exists for this contestant and category
        $query2 = "SELECT * FROM final_score WHERE contestant_id = '$contestant' AND category_id = '$event_id'";
        $result2 = $con->query($query2);

        if ($result2->num_rows > 0) {
            // Update existing record
            $update_query = "UPDATE final_score 
                             SET total_score = '$total_score' 
                             WHERE contestant_id = '$contestant' AND category_id = '$event_id'";
            mysqli_query($con, $update_query);
        } else {
            // Insert new record
            $insert_query = "INSERT INTO final_score (contestant_id, category_id, total_score) 
                             VALUES ('$contestant', '$event_id', '$total_score')";
            mysqli_query($con, $insert_query);
        }
    }

} else {
    // Handle case where 'contestant_id' is not set
}

header('location: ../scores.php');
?>
