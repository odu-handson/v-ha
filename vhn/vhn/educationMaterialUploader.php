<?php
	//include "expire.php";
	require_once('connectDB.php');

	$type = $_POST['type'];
	
	$month = $_POST['month'];
	
	$week = $_POST['week'];
		
$target_path = "./educationMaterial/m".$month."w".$week.$type.".pdf";

if(!empty($_FILES['uploaded']['tmp_name']))
{
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path)) {
		echo "The file has been uploaded!</br>";
	} else{
		echo "There was an error uploading the file, please try again!</br>";
	}
}
else
{
	echo "There was an error uploading the file, please contact an Administrator!</br>";
}
?>