<?php

include 'connectDB.php';

$sql = "SELECT pdf FROM pdfstore WHERE id =".$_REQUEST['id'];
$result = mysql_query($sql) or die('Bad query!'.mysql_error());  

	while($row = mysql_fetch_array($result,MYSQL_ASSOC))
	{       
		$db_pdf = $row['pdf']; // No stripslashes() here.
	}

	file_put_contents("temp.pdf",$db_pdf);
	echo '<object data="temp.pdf" type="application/pdf" width="70%" height="100%">';




?>
