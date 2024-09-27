<?php
include('dbcon.php');
$result= "";
$message = "";
$eventCategory = array();
$_POST['apiKey'] = 'Seait2024'; //Static for Testing only
if(isset($_POST['apiKey'])){
	//We'll update the more secured token on production mode
	if($_POST['apiKey'] == 'Seait2024'){
		$eventQuery = mysqli_query($conn, "SELECT * FROM event_category");
		if(mysqli_num_rows($eventQuery) > 0){
			$result= "true";
			$message = "List of Events category";
			while ($eventRow = mysqli_fetch_assoc($eventQuery)) {
				array_push($eventCategory, $eventRow);
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

$response = array('result' => $result, 'message' => $message, 'event_category' => $eventCategory);
echo(json_encode($response));

?>