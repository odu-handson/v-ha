<?php
	include "expire.php";
	require_once('connectDB.php');
	
	if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
	{
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];

		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

		if(!get_magic_quotes_gpc())
		{
			$fileName = addslashes($fileName);
		}

		$query = "INSERT INTO pdfstore (name, size, type, pdf ) ".
		"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

		mysql_query($query) or die('Error, query failed');

		echo "<br>File $fileName has been uploaded<br>";
	} 
?>