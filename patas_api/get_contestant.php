<?php
include('dbcon.php');
$result= "";
$message = "";
$contestants = array();
$_POST['apiKey'] = 'Seait2024'; //Static for Testing only
if(isset($_POST['apiKey'])){
	//We'll update the more secured token on production mode
	if($_POST['apiKey'] == 'Seait2024'){
		$contestantsQuery = mysqli_query($conn, "SELECT * FROM contestants");
		if(mysqli_num_rows($contestantsQuery) > 0){
			$result= "true";
			$message = "List of Events category";
			while ($contestantsRow = mysqli_fetch_assoc($contestantsQuery)) {
				array_push($contestants, $contestantsRow);
			}
		}
		else{
			$result= "true";
			$message = "No contestants found in the Cloud";

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

$response = array('result' => $result, 'message' => $message, 'contestants' => $contestants);
echo(json_encode($response));

?>