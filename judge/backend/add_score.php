<?php
session_start();
require('../../includes/dbcon.php');

if (isset($_POST['contestant_id'])) {
    $event_id = $_POST['event_id'];
    $contestant = $_POST['contestant_id'];
    $user = $_SESSION['username'];

    // Insert score into the scores table
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
                
                if (!$result1) {
                    echo "Error inserting score: " . mysqli_error($con);
                } else {
                    unset($_SESSION["" . $criteria_id . ""]);
                }
            }
        }
    }

    // Aggregate total score from all judges
    $query2 = "SELECT SUM(score) AS total_score 
               FROM scores 
               WHERE contestant = '$contestant' AND category = '$event_id'";
    $result2 = $con->query($query2);

    if (!$result2) {
        echo "Error aggregating scores: " . mysqli_error($con);
    } else {
        $row = $result2->fetch_assoc();
        $total_score = $row['total_score'];

        // Update final_score table with aggregated total score
        if ($total_score !== null) {
            $query3 = "SELECT * FROM final_score WHERE contestant_id = '$contestant' AND category_id = '$event_id'";
            $result3 = $con->query($query3);

            if (!$result3) {
                echo "Error checking final_score: " . mysqli_error($con);
            } else {
                if ($result3->num_rows > 0) {
                        // Update existing record
                        $update_query = "UPDATE final_score 
                                        SET total_score = '$total_score', 
                                            final_score = '$total_score' 
                                        WHERE contestant_id = '$contestant' AND category_id = '$event_id'";
                        $update_result = mysqli_query($con, $update_query);
                        if (!$update_result) {
                            echo "Error updating final_score: " . mysqli_error($con);
                        }

                        // Insert new record
                        $insert_query = "INSERT INTO final_score (contestant_id, category_id, total_score, final_score) 
                                        VALUES ('$contestant', '$event_id', '$total_score', '$total_score')";
                        $insert_result = mysqli_query($con, $insert_query);
                        if (!$insert_result) {
                            echo "Error inserting final_score: " . mysqli_error($con);
                        }
                } else {
                    // Insert new record
                    $insert_query = "INSERT INTO final_score (contestant_id, category_id, total_score, final_score) 
                                    VALUES ('$contestant', '$event_id', '$total_score', '$total_score')";
                    $insert_result = mysqli_query($con, $insert_query);
                    if (!$insert_result) {
                        echo "Error inserting final_score: " . mysqli_error($con);
                    }
                }
            }
        }
    }
} else {
    // Handle case where 'contestant_id' is not set
}

header('location: ../scores.php');
?>
