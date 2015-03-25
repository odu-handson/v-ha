<?php
	
	
	// Get important information about the file and put it into variables
	$fileName = $_FILES['file']['name'];
	$tmpName  = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileType = $_FILES['file']['type'];

	// Slurp the content of the file into a variable
	$fp = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);

	if(!get_magic_quotes_gpc())
		$fileName = addslashes($fileName);
		
	$file_info = pathinfo($_FILES['file']['name']);
	require_once('connectDB.php');
	$sql = "INSERT INTO user_pdfforms(user_id, consent_form, consent_date, consent_investigator_id) values(88, '".$content."', 1382950705, 1)";
	
	$result = mysql_query($sql) or die(mysql_error());
	if(!$result)
	{
		echo "Could not add this file.";
		exit;
	} 
	else
	{
		echo  "New file successfully added.";
	}
?>