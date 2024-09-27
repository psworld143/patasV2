<?php
include('dbcon.php');
$result= "";
$message = "";
$scoresCategory = array();
$_POST['apiKey'] = 'Seait2024'; //Static for Testing only
if(isset($_POST['apiKey'])){
	//We'll update the more secured token on production mode
	if($_POST['apiKey'] == 'Seait2024'){
		$eventQuery = mysqli_query($conn, "SELECT * FROM scores");
		if(mysqli_num_rows($scoresQuery) > 0){
			$result= "true";
			$message = "List of scores";
			while ($scoresRow = mysqli_fetch_assoc($scoresQuery)) {
				array_push($scores, $scoresRow);
			}
		}
		else{
			$result= "true";
			$message = "No events found in the Cloud";

		}
	}
	else{
		$result= "false";
		$message = "Invalid API Token Recieved";
	}

}
else{
	$result = "false";
	$message = "No API token sent";
}

$response = array('result' => $result, 'message' => $message, 'scores' => $scores);
echo(json_encode($response));

?>