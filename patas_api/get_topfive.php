<?php
include('dbcon.php');
$result= "";
$message = "";
$topfiveCategory = array();
$_POST['apiKey'] = 'Seait2024'; //Static for Testing only
if(isset($_POST['apiKey'])){
	//We'll update the more secured token on production mode
	if($_POST['apiKey'] == 'Seait2024'){
		$eventQuery = mysqli_query($conn, "SELECT * FROM topfive");
		if(mysqli_num_rows($topfiveQuery) > 0){
			$result= "true";
			$message = "List of topfive";
			while ($topfiveRow = mysqli_fetch_assoc($topfiveQuery)) {
				array_push($topfive, $topfiveRow);
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